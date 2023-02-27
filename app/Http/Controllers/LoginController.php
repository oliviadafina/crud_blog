<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    public function login()
    {
        return view('login', [
            "title" => "Form Login"
        ]);
    }

    public function actionlogin(Request $request){
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        ];

        if(Auth::attempt($data)){
            return redirect('post');
        } else {
            return redirect('/')->with('error', 'Periksa Email dan Password Anda!');
        }
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
    
public function registrasi(){
    return view('register', [
        'title' => 'Form Registrasi'
    ]);
}
public function masuk(Request $request){
    $validasiData = $request->validate([
        'name'      => 'required|max:255',
        'email'     => 'required|',
        'password'  => 'required|min:5|max:255'
    ]);

    $validasiData['password'] = Hash::make($validasiData['password']);


    User::create($validasiData);
    return redirect('/')->with('success', 'Registrasi Berhasil');
}

public function redirectToProvider()
{
    return Socialite::driver('google')->redirect();
}

public function handleProviderCallback(Request $request)
{
    try {
        $user_google    = Socialite::driver('google')->user();
        $user           = User::where('email', $user_google->getEmail())->first();

        //jika user ada maka langsung di redirect ke halaman home
        //jika user tidak ada maka simpan ke database
        //$user_google menyimpan data google account seperti email, foto, dsb

        if($user != null){
            \auth()->login($user, true);
            return redirect('post');
        }else{
            $create = User::Create([
                'email'             => $user_google->getEmail(),
                'name'              => $user_google->getName(),
                'password'          => 0,
                'email_verified_at' => now() // fungsi tgl saat ini
            ]);

            \auth()->login($create, true);
            return redirect('post');
        }

    } catch (\Exception $e) {
        return redirect('/');
    }


}
}
