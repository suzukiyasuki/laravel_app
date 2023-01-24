<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;

class ProductContrller extends Controller
{
    public function show(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = item::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")->orWhere('text', 'LIKE', "%{$keyword}%");
        }
        $items = $query->get();

        return view('top', compact('items', 'keyword'));
    }
}
