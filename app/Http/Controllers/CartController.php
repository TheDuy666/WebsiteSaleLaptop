<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function viewCart()
    {
        {
            $user = auth()->user();
            $cart = $user->cart;
            $cartDetails = $cart->cartDetails()->with('product')->get();


            $totalAmount = 0;
            foreach ($cartDetails as $cartDetail) {
                $totalAmount += $cartDetail->quantity * $cartDetail->product->price;
            }

            return view('customer.cart', compact('cartDetails','totalAmount'));
        }
    }
    public function add(Product $product, Request $request)
    {
        if ($request->type === "ADD_TO_CART") {
            $quantity = $request->quantity ?: 1;
            // Lấy cart_id từ bảng carts
            $cartId = Cart::where('user_id', auth()->user()->id)->value('id');

            // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
            $cartDetail = CartDetail::where([
                'cart_id' => $cartId,
                'product_id' => $product->id
            ])->first();
            if ($cartDetail) {
                // Sản phẩm đã có trong giỏ hàng, tăng quantity lên
                $cartDetail->increment('quantity', $quantity);
            } else {
                // Sản phẩm chưa có trong giỏ hàng, thêm mới
                CartDetail::create([
                    'cart_id' => $cartId,
                    'product_id' => $product->id,
                    'quantity' => $quantity
                ]);
            }
            flash() -> addSuccess('Thêm thành công');
            return redirect()->back();
        }
        if ($request->type === "DAT_HANG") {
            $product = DB::table('products')
                ->select('products.*')
                ->where('products.id', $product->id)
                ->first();

            $quantity = $request->input('quantity', 1);
            // Xử lý logic mua hàng tại đây

            return view('customer.buy-now', ['product' => $product, 'quantity' => $quantity]);
        }
    }
    public function update($product_id, Request $request)
    {
        $newQuantity = $request->input('quantity');

        $cart = auth()->user()->cart;
        $cartDetail = $cart->cartDetails()->where('product_id', $product_id)->first();

        if ($cartDetail) {
            $cartDetail->update(['quantity' => $newQuantity]);
        }

        return redirect()->route('customer.cart');
    }

    public function delete($product_id)
    {
        $cart = auth()->user()->cart;
        $cart->cartDetails()->where('product_id', $product_id)->delete();

        return redirect()->back()->with('success', 'Product deleted from shopping cart');
    }

    public function clear()
    {
        $cart = auth()->user()->cart;
        $cart->cartDetails()->delete();

        return redirect()->back()->with('success', 'Shopping cart cleared');
    }

}
