<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use App\Category;

class TopController extends Controller
{
    public function index(Request $request)
    {

        $keyword = $request->input('keyword');
        $size = $request->input('size');
        $category = $request->input('category');

        $query = item::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")->orWhere('text', 'LIKE', "%{$keyword}%");
        }
        if (!empty($size)) {
            $query->where('size', 'LIKE', "%{$size}%");
        }
        if (!empty($category)) {
            $query->where('category_id', 'LIKE', "%{$category}%");
        }

        $items = $query->get();
        $categories = Category::all();

        return view('top', compact('items', 'keyword', 'categories'));
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
