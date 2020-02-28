<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\user;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // userInsertメソッド
    public function userInsert(RegisterRequest $req)
    {
        // リクエスト内の入力データをチェック(validation)する。

        /*
        $req->validate([
            'user' => 'required|email', // 必須チェック
            'passwd' => 'required|min:6', // 必須チェック
        ]); */

        // validationが成功した場合は、次の命令を実行失敗した場合は、controllerを呼び出した画面に自動リダイレクト

        $userObj = new user();
        // print($req->user);
        // print($req->passwd);
        // print('ユーザ登録を行います!');
        $ret = $userObj->registUsers($req->user, $req->passwd);
        // 登録画面に結果を返す
        return view('userRegist', ['ret' => $ret]);
    }

    public function usersShow()
    {
        $items = user::all();
        return view('/userShow', ['items' => $items]);
        // $userObj = new user();
        // $userDate = $userObj->selectUsers();
        // return view('userTable', ['userDate' => $userDate]);
    }

    public function deleteUser(Request $req)
    {
        try {
            print($req);
            user::where('user', $req)->delete();
            $items = user::all();
            return view('/userShow', ['items' => $items]);
        } catch (\Exception $e) {
            // ユーザ登録処理の失敗時
            $ret = -21;
        }
    }

    public function selectUsers()
    {
        try {
            $ret = user::all();
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('/userShow', ['userDate' => $ret]);
    }

    public function userDelete(Request $req)
    {
        //削除ユーザ名取得
        $user = $req->deluser;
        //userオブジェクト生成
        $userObj = new user();
        $userObj->deleteUser($user);
        $ret = user::all();
        return view('/userShow', ['userDate' => $ret]);
    }

    public function userLogin(RegisterRequest $req)
    {
        $userObj = new user();
        $ret = $userObj->loginUser($req->user, $req->passwd);
        print($ret);
    }
}
