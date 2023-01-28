<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\item;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();

        return view('detail_mypage')->with(['id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * del_flg = 0 未購入
     * del_flg = 1 購入済
     */

    public function show($id)
    {
        $user = User::find($id);

        $items = item::where('customer_id', $id)->where('del_flg', 1)->get();

        $itemSum = $items->sum('amount');

        return view('detail_mypage')->with(['user' => $user, 'items' => $items, 'Sum' => $itemSum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('edit_mypage')->with(['user' => $user]);
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
            'email' => 'required',

        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/top');
    }

    public function post(Request $request)
    {
        $validate_rule = [
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ];

        $this->validate($request, $validate_rule);
        return view('/', ['msg' => '正しく入力されました']);
    }
}
