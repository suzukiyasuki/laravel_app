<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
class TopController extends Controller
{
    public function index()
    {
        $query = item::all()->toArray();
        return view('top')->with(['items' => $query]);
    }
}
