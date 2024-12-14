<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        // Validasi input
        $request->validate([
            'category' => 'required|string|max:255',
        ], [
            'category.required' => 'Category harus diisi.',
            'category.string' => 'Category harus berupa teks.',
            'category.max' => 'Category tidak boleh lebih dari 255 karakter.',
        ]);

        $category = new Category();

        $category->category_name = $request->category;

        $category->save();

        session()->flash('success', 'Category Added Successfully!');


        return redirect()->back();
    }

    public function delete_category($id)
    {
        $category = Category::find($id);

        $category->delete();

        session()->flash('success', 'Category Deleted Successfully!');

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find( $id );

        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ], [
            'category.required' => 'Category harus diisi.',
            'category.string' => 'Category harus berupa teks.',
            'category.max' => 'Category tidak boleh lebih dari 255 karakter.',
        ]);

        $category = Category::find($id);

        $category->category_name = $request->category;

        $category->save();

        session()->flash('success', 'Category Updated Successfully!');

        return redirect('/view_category');
    }


    public function add_product()
    {
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product();

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;
        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products', $imageName);

            $data->image = $imageName;
        }

        $data->save();

        session()->flash('success', 'Product Added Successfully!');

        return redirect()->back();
        
    }


    public function view_product()
    {
        $product = Product::paginate(5);

        return view('admin.view_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);

        $image_path = public_path('products/'.$product->image);

        if(file_exists($image_path)){
            unlink($image_path);
        }

        $product->delete();

        session()->flash('success', 'Product Deleted Successfully!');

        return redirect()->back();
    }

    public function update_product($id)
    {
        $data = Product::find($id);

        $category = Category::all();

        return view('admin.update_page', compact('data', 'category'));
    }

    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;
        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products', $imageName);

            $data->image = $imageName;
        }

        $data->save();

        session()->flash('success', 'Product Updated Successfully!');

        return redirect('/view_product');
    }


    public function product_search(Request $request)
    {
        $search = $request->search;

        $product = Product::where('title', 'like', '%'.$search.'%')->orWhere('category', 'like', '%'.$search.'%')->paginate(5);

        return view('admin.view_product', compact('product'));
    }
    
    public function view_order()
    {
        $data = Order::all();
        return view('admin.order', compact('data'));
    }

    public function on_the_way($id)
    {
        $data = Order::find($id);

        $data->status = 'On The Way';

        $data->save();

        session()->flash('success', 'Order Status Updated Successfully!');

        return redirect('/view_order');
    }

    public function delivered($id)
    {
        $data = Order::find($id);

        $data->status = 'Delivered';

        $data->save();

        session()->flash('success', 'Order Status Updated Successfully!');

        return redirect('/view_order');
    }


}
