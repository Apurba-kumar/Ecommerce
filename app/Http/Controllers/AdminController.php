<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Category;


class AdminController extends Controller
{
    public function view_category(){
        $data = category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request){

        $data = new category;
        $data->category_name = $request->category;
        $data->save();
       return redirect()->back()->with('message','Category added successfully');
    }

    public function delete_category($id)
    {
       $data=category::find($id);
       $data->delete();
       return redirect()->back()->with('message','Category deleted successfully');
    }
}
