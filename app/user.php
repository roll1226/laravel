<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
// データベースのテーブル名とモデル名はテーブル名 = モデル名の複数形
// Eloquentシステムは、モデル名からテーブルを自動的にオブジェクト化する

// モデルとテーブルめが命名規則に則らない場合
// protected $table = "テーブル名";
class user extends Model
{
    // registUsersメソッドを作成
    public function registUsers($user, $passwd)
    {
        $ret = 0; // 0: 正常終了

        // データベース処理
        try {
            // ユーザ登録処理
            $this->user = $user;
            $this->passwd = $passwd;
            // 明示コミット
            $this->save();
        } catch (\Exception $e) {
            // ユーザ登録処理の失敗時
            $ret = -21;
        }

        return $ret;
    }

    public function deleteUser($user)
    {
        $user = $this::where('user', $user);
        //削除
        $user->delete();
    }

    public function loginUser($user, $passwd)
    {
        $sql = DB::connection()->getPdo();
        $stmt = $sql->prepare("select count(*) from users where user=:user and passwd=:passwd;");

        // SQLにデータを挿入
        $stmt->bindParam(":user", $user);
        $stmt->bindParam(":passwd", $passwd);

        $stmt->execute();
        $cnt = $stmt->fetchColumn();
        if ($cnt == 1) {
            return 'ログイン成功';
        } else {
            return 'ログイン失敗';
        }
    }
}
