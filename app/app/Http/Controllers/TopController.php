<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;

class TopController extends Controller
{
    public function index(Request $request)
    {
        $query = item::all()->toArray();
        $keyword = $request->input('keyword');
        return view('top')->with(['items' => $query, 'keyword' => $keyword]);
    }

    /**
     * del_flg = 0 購入済
     * del_flg = 1 未購入
     */
    public function show()
    {
        $items = item::where('del_flg', 1)->get();

        return view('/top', ['items', $items]);
    }
}
