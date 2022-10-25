<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(3);
        return view('home.userpage', compact('product'));
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            $product = Product::paginate(3);
            return view('home.userpage', compact('product'));
        }
    }
}
