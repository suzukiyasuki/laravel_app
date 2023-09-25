<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use App\Category;
use App\User;
use App\Services\TopServices;


class TopController extends Controller
{
    private $topServices;

    public function __construct(TopServices $topServices)
    {
        $this->topServices = $topServices;
    }

    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $size = $request->input('size');
        $category = $request->input('category');

        $items = $this->topServices->getItemList($keyword, $size, $category);

        $categories = Category::all();

        return view('top', compact('items', 'keyword', 'categories'));
    }

    /**
     * del_flg = 0 未購入
     * del_flg = 1 購入済
     */
    public function show()
    {
        $items = item::where('del_flg', 0)->get();

        return view('/top', ['items', $items]);
    }

    public function role($id)
    {
        $user = User::where('role', 0)->where('counts', '>=', 5)->get();


        return view('management_user', ['user' => $user]);
    }

    public function count($id)
    {
        $user = User::find($id);
        $count = $user->counts;

        $result = $count + 1;
        $user->counts = $result;

        $user->save();

        return back();
    }

    public function destory($id)
    {
        $user = User::find($id);
        $user->delete();
        $item = item::where('user_id', $id);
        $item->delete();

        return redirect('/top');
    }
}
