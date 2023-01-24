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

        return view('cart')->with(['item' => $item]);
    }

    public function buy($id)
    {
        $item = item::find($id);

        $item->customer_id = Auth::id();

        $item->save();

        return redirect('/top');
    }

    public function complete($id)
    {
        $item = item::where('customer_id', $id)->get();
        foreach ($item as $value) {
            $value->del_flg = 0;
            $value->save();
        }

        return view('complete');
    }
}
