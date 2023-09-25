<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\item;

class ItemServices
{
    /**
     * 商品リスト取得
     * @param $request リクエスト
     */
    public function storeItem(Request $request)
    {
        $item = new item;

        $item->amount = $request->amount;
        $item->name = $request->name;
        $item->text = $request->text;
        $item->size = $request->size;
        $item->user_id = $request->user_id;
        $item->category_id = $request->category_id;
        $path = $request->image->store('public');
        $filename = basename($path);
        $item->image = $filename;

        $item->save();
    }

    public function updateItem(Request $request, $id)
    {

        $item = item::find($id);
        $item->name = $request->name;
        $item->amount = $request->amount;
        $item->text = $request->text;
        $item->size = $request->size;
        $item->category_id = $request->category_id;
        if (!empty($request->image)) {
            $path = $request->image->store('public');
            $filename = basename($path);
            $item->image = $filename;
        }

        $item->save();
    }
}
