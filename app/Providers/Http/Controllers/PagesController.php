<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\Product;
use Illuminate\Support\Facades\Storage;
use DB;
class PagesController extends Controller
{
    public function orders(Request $request) {
        $products = Product::all(['id', 'book_name'])->pluck('book_name', 'id');

        $search = $request->input('search');
        $sort = $request->input('sort');
        $by = $request->input('value');

        if(!empty($search) and !empty($sort)) {
            if($by === 'asc') {
                $orders = Orders::where('first_name', 'like', '%'.$search.'%')->orWhere('last_name', 'like', '%'.$search.'%')->orWhere('email', 'like', '%'.$search.'%')->orWhere('address', 'like', '%'.$search.'%')->orWhere('created_at', 'like', '%'.$search.'%')->orderBy($sort)->paginate(10);
                return view('pages.orders')->with('orders', $orders)->with('products', $products);
            } else {
                $orders = Orders::where('first_name', 'like', '%'.$search.'%')->orWhere('last_name', 'like', '%'.$search.'%')->orWhere('email', 'like', '%'.$search.'%')->orWhere('address', 'like', '%'.$search.'%')->orWhere('order_date', 'like', '%'.$search.'%')->orderBy($sort)->paginate(10);
                return view('pages.orders')->with('orders', $orders)->with('products', $products);
            }
            return view('pages.orders')->with('orders', $orders)->with('products', $products);
        }

        if (!empty($search)) {
            $orders = Orders::where('first_name', 'like', '%'.$search.'%')->orWhere('last_name', 'like', '%'.$search.'%')->orWhere('email', 'like', '%'.$search.'%')->orWhere('address', 'like', '%'.$search.'%')->orWhere('created_at', 'like', '%'.$search.'%')->paginate(10);

            return view('pages.orders')->with('orders', $orders)->with('products', $products);
        }

        if (!empty($sort)) {
            if($by === 'asc') {
                $orders = Orders::orderBy($sort)->paginate(10);
                return view('pages.orders')->with('orders', $orders)->with('products', $products);
            } else {
                $orders = Orders::orderBy($sort, 'desc')->paginate(10);
                return view('pages.orders')->with('orders', $orders)->with('products', $products);
            }
        }

        $orders = Orders::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.orders')->with('orders', $orders)->with('products', $products);
    }

    public function product() {
        $product = Product::where('status', 1)->first();

        return view('pages.product')->with('product', $product);
    }

    public function addOrder(Request $request) {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required | email',
            'address' => 'required'
        ]);

        //Create order
        $order = new Orders;
        $order->first_name = $request->input('first_name');
        $order->last_name = $request->input('last_name');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->product_id = $request->input('product_id');
        $order->save();

        $messege = "Thank you ";
        $messege .= $request->input('first_name');
        $messege .= " for your order. Check your e-mail address ";
        $messege .= $request->input('email');
        $messege .= " for more information.";
        return redirect('/')->with('success', $messege);
    }

    public function addProduct(Request $request) {
        //Validation
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'pages_number' => 'required | integer',
            'year' => 'required | integer',
            'image' => 'nullable|image|max:1999',
            'price' => array('required', 'regex:/^\d*(\.\d{2})?$/')
        ]);
        //File upload
        if($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        //Create order
        $product = new Product;
        $product->book_name = $request->input('name');
        $product->author = $request->input('author');
        $product->pages_number = $request->input('pages_number');
        $product->year = $request->input('year');
        $product->status = '0';
        $product->image = $fileNameToStore;
        $product->price = $request->input('price');
        $product->save();
        return redirect('/orders')->with('success', 'Product added to the database');
    }

    public function updateProducts(Request $request) {
        Product::where('status', '1')->update(array('status' => '0'));

        $product = Product::find($request->input('products'));
        $product-> status = '1';
        $product->save();
        
        return redirect('/orders')->with('success', 'Main product is succesfully updated');
    }
}
