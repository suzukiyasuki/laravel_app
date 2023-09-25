<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\item;
use App\Category;
use Illuminate\Support\Facades\Storage;
use App\Services\ItemServices;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $itemServices;

    public function __construct(ItemServices $itemServices)
    {
        $this->itemServices = $itemServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('detail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        // $id = Auth::id();

        // $params = item::where('user_id', $id)->where('category_id', $id)->get();

        return view('create_item', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'text' => 'required',
            'category_id' => 'required',
            'size' => 'required',
            'image' => 'required',
        ]);

        $this->itemServices->storeItem($request);

        return redirect('/top');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = item::find($id);

        return view('detail')->with(['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = item::find($id);
        $categories = Category::all();

        return view('edit_item')->with(['item' => $item, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'text' => 'required',
            'category_id' => 'required',
            'size' => 'required',
        ]);

        $this->itemServices->updateItem($request, $id);

        return redirect('/items/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userId = Auth::id();
        $item = item::find($id);
        $item->delete();

        return redirect('/users/' . $userId);
    }
    public function post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'text' => 'required',
            'category_id' => 'required',
            'size' => 'required',
            'image' => 'required',
        ]);
    }
}
