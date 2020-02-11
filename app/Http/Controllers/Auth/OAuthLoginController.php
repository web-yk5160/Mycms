<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Laravel\Socialite\Facades\Socialite;


class OAuthLoginController extends Controller
{
    public function getFacebookAuth()
    {
        return Socialite::driver('facebook')->redirect();
    }
    //Callback処理
    public function getFacebookAuthCallback()
    {
        // ユーザ属性を取得
        try {
            $userSocial = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            // OAuthによるユーザー情報取得失敗
            return redirect('/');
        }
        if($userSocial){
            dd($userSocial);
        } else {
            return 'Something went wrong.';
        }
    }
}