<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // GET: /login
    function viewLogin()
    {
        // Kiem tra xem da dang nhap hay chua ?
        if (Auth::check()) {
            // Da dang nhap
            $user = Auth::user();
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.home');
                    break;
                case 'customer':
                    return redirect()->route('customer.home');
                    break;
            }
        }
        // view dang nhap
        return view('auth.login');
    }

    // POST: /login
    public function login(Request $request)
    {
        // Xử lý đăng nhập
        $email = $request->get('email');
        $password = $request->get('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();

            // Kiểm tra trạng thái xác nhận email
            if ($user->role !== 'admin' && $user->email_verified_at === null) {
                Auth::logout();
                sweetalert()->addWarning('Vui lòng xác nhận email trước khi đăng nhập.');
                return redirect()->back();
            }

            // Xem vai trò của người dùng
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.home');
                case 'customer':
                    return redirect()->route('customer.home');
            }
        } else {
            // Chuyển hướng về login
            sweetalert()->addWarning('Sai email hoặc mật khẩu');
            return redirect()->back();
        }
    }

    // POST: /dang xuat
    function logout()
    {
        if(Auth::user()->role == 'customer') {
            Auth::logout();
            return redirect()->route('customer.home');
        } else if(Auth::user()->role == 'admin') {
            Auth::logout();
            return redirect()->route('customer.home');
        }
    }



//    function register(Request $request)
//    {
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:8',
//        ]);
//
//        $user = new User();
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->password = Hash::make($request->password);
//        $user->save();
//
//        return response()->json(['message' => 'User registered successfully'], 201);
//    }
}
