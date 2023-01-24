<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\like;


class LikeControler extends Controller
{
    public function like(Request $request)
    {
        if ($request->input('like') == 0) {
            //ステータスが0のときはデータベースに情報を保存
            like::create([
                'item_id' => $request->input('item_id'),
                'user_id' => Auth::id(),
            ]);
            //ステータスが1のときはデータベースに情報を削除
        } elseif ($request->input('like')  == 1) {
            like::where('item_id', "=", $request->input('item_id'))
                ->where('user_id', "=", Auth::id())
                ->delete();
        }
        return  $request->input('like');
    }
}
