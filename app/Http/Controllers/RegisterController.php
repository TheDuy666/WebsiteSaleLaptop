<?php

namespace App\Http\Controllers;

use App\Mail\VerifyAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    public function viewRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $existingUser = User::where('email', $request->input('email'))->first();
        if ($existingUser) {
            sweetalert()->addWarning('Email đã tồn tại');
            return redirect()->back();
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'customer';
        $user->remember_token = Str::random(10);
        $user->DOB = $request->input('DOB', '2000-01-01');
        $user->created_at = now();
        $user->updated_at = now();
        $user->email_verification_token = Str::random(60);
        $user->save();

        $cart = $user->cart()->create();

        $verificationUrl = route('account.verify', ['token' => $user->email_verification_token]);
        Mail::to($user->email)->send(new VerifyAccount($verificationUrl,  $user->name));


        flash()->addSuccess('Đăng ký thành công. Vui lòng kiểm tra email để xác nhận tài khoản.');
        return redirect()->route('customer.home');
    }
    public function verify(Request $request, $token)
    {
        $user = User::where('email_verification_token', $token)->first();
        if ($user) {
            $user->email_verified_at = now();
            $user->email_verification_token = null;
            $user->save();
            return redirect()->route('customer.home')->with('success', 'Email của bạn đã được xác nhận! Bạn có thể đăng nhập.');
        }
        return redirect()->route('customer.home')->with('error', 'Không tìm thấy thông tin xác nhận email.');
    }

}
