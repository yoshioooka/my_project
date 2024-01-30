<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // DB 接続用 class

class SampleController extends Controller {
    public function index( Request $request ) {
        $sampleValue = "自身で作成したSampleページです!!"; // 追加

        // 参照
        $records = DB::connection('mysql')->select("select * from users");
        $email = $records[0]->email; // dd の処理を削除するため、$email 変数に代入する内容へ変更

        // 追加
        //$insertResult = DB::connection("mysql")->insert("insert into users (id,email,name,password) values (null,'aaa@aaa','yamada','ttttest')");
        //dd($insertResult);


        //名前の更新
        //$insertResult = DB::connection("mysql")->update("update users set name = 'tanaka' where email = 'aaa@aaa'");
        //dd($insertResult);

        // 削除
        $deleteResult = DB::connection("mysql")->delete("delete from users where name = ''");
        dd($deleteResult);
        return view("sample/index" , [ "sampleValue" => $sampleValue ]); // 変更
    }
}
