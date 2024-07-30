<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandsController extends Controller
{
    public function viewAdminBrands() {
        $allBrands = DB::table('brands')->select(['id', 'name','created_at', 'updated_at' ])->get();
        return view('admin.brands', ['allBrands' => $allBrands]);
    }

    public function createBrand(Request $request) {
        $name = $request->get('name');
        //tao products -> chuyen huong ve home
        DB::table('brands')->insert([
            'name' => $name,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
        flash() -> addSuccess('Add brand succesfully!');
        return redirect()->back();
    }
    public function deleteBrandById($id){
        DB::table('brands') -> delete($id);
        if ($id == 0) {
            //cap nhat that bai
            flash() -> addError('Delete failed!');
        } else {
            flash() -> addSuccess('Delete successfully!');
        }
        return redirect() -> back();
    }

    function viewEditBrand($id) {
        $brand = Brand::findOrFail($id);


        // Lấy danh sách các cặp category_id và category_name từ $allProducts

        return view('admin.edit-brand', compact('brand'));

    }

    public function editBrandById ($id, Request $request) {
        // Bước 1: kiểm tra xem bài viết có tồn tại hay không
        $brand = DB::table('brands') -> find($id);
        if ($brand == null) {
            return redirect('/admin/brand');
        }
        //buowc2 capnhat thong tin
        $name = $request->get('name');
        // buoc 3: cap nhat
        $brand = DB::table('brands')->where('id', '=', $id) -> update(
            [
                'name' => $name,
                'created_at'=> now(),
                'updated_at'=> now(),
            ]
        );
        //bước 4L thông báo -> chuyen hương ve home
        if ($brand == 0) {
            //cap nhat that bai
            flash() -> addError('Cap nhat that bai');
        } else {
            flash() -> addSuccess('Cap nhat thanh cong');
        }
        return redirect()->route('admin.brands');
    }
    public function showProductsByBrand($brandId)
    {
        $brandInfo = Brand::findOrFail($brandId);
        $allProducts = $brandInfo->products;
        $allBrands = Brand::pluck('name', 'id')->toArray();


        return view('customer.view-brand', [
            'brandInfo' => $brandInfo,
            'allProducts' => $allProducts,
            'allBrands' => $allBrands,
        ]);
    }

}
