<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use PDF;
use  Notification;

use App\Notifications\sendEmailNotification;


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

    public function view_product(){
        $category = category::all();
        return view('admin.product', compact('category'));
    }
public function add_product(Request $request){
    $product= new product;
    $product->title = $request->title;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->discount_price = $request->discount_price;
    $product->quantity = $request->quantity;
    $product->category = $request->category;
    $image= $request->image;
    $imagename = time().'.'.$image->getClientOriginalExtension();
    $request->image->move('product', $imagename);
    $product->image = $imagename;
    $product->save();
       return redirect()->back()->with('message','Product added successfully');

}
public function show_product(){
    $product = product::all();
    return view('admin.show_product', compact('product'));
}

public function delete_product($id)
{
   $data=product::find($id);
   $data->delete();
   return redirect()->back()->with('message','Product deleted successfully');
}

public function edit_product($id){
    $product = product::find($id);
    $category = Category::all();

    return view('admin.update_product', compact('product','category'));
}
public function update_product(Request $request,$id){
 $product= product::find($id);

    $product->title = $request->title;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->discount_price = $request->discount_price;
    $product->quantity = $request->quantity;
    $product->category = $request->category;
    $image= $request->image;

    if($image)
    {
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;
    }

    $product->save();
       return redirect()->back()->with('message','Product updated successfully');
}
public function order(){
    $order= Order::all();

    return view('admin.order', compact('order'));
}

public function delivered($id){

    $order=Order::find($id);
    $order->delivery_status= "delivered";
    $order->payment_status= "Paid";
    $order->save();
    return redirect()->back()->with('message', 'Product delivered successfully');

}

public function print_pdf($id){

$order= Order::find($id);
  $pdf =PDF::loadView('admin.pdf', compact('order'));
  return $pdf->download('order_details.pdf');
}

public function send_email($id){

    $order= Order::find($id);


    return view('admin.email_info', compact('order'));
}

public function send_user_email(Request $request, $id){
    $order= Order::find($id);
    $details = [
        'greeting'=>$request->greeting,
        'firstline'=>$request->firstline,
        'body'=>$request->body,
        // if you want to send some default text then you have to write below this
        // 'body'=>'whatever message you want to send just wirte here it goes by default',
        'button'=>$request->button,
        'url'=>$request->url,
        'lastline'=>$request->lastline,
    ];

    Notification::send($order, new sendEmailNotification($details));
    return redirect()->back();
}

public function search(Request $request){
    $searchText= $request->search;
    $order = Order::where('name','LIKE', "%$searchText%")->orWhere('phone','LIKE', "%$searchText%")->orWhere('product_title','LIKE', "%$searchText%")->get();
    return view('admin.order', compact('order'));
}

}
