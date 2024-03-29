<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $item = item::where('customer_id', $id)->get();

        $itemSum = $item->sum('amount');
        return view('cart')->with(['item' => $item, 'Sum' => $itemSum]);
    }

    public function buy()
    {
        $request = request();
        $item = item::find(1);
        logger()->info($$request['id']);

        $item->customer_id = Auth::id();

        $item->save();

        return response()->json('カートに商品が追加されました。');
    }

    public function complete($id)
    {
        $item = item::where('customer_id', $id)->get();
        foreach ($item as $value) {
            $value->del_flg = 1;
            $value->save();
        }

        return view('complete');
    }

    public function remove(Request $request, $id)
    {
        $item = item::find($id);

        $item->customer_id = null;

        $item->save();

        return back();
    }
}
