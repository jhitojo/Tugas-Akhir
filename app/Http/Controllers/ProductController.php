<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user = Auth::user();
        $categories = Category::all();

        if($user->id == 1){
            $products = Product::all();
        } else {
            $products = Product::where('user_id', $user->id)->get();
        }
        $edit = 0;
        // return $products;
        return view('admin.product.index', compact('products','user','edit','categories',$categories));
        // return view('admin.product.index')->with('products',$products);
    }

    public function index_seller()
    {
        $user = Auth::user();
        $categories = Category::all();

        if($user->id == 1){
            $products = Product::all();
        } else {
            $products = Product::where('user_id', $user->id)->get();
        }
        $edit = 0;
        // return $products;
        return view('seller.product.index', compact('products','user','edit','categories',$categories));
        // return view('admin.product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $category=Category::all();
        if($user->id == 1) {
            $product = Product::all();
        } else {
           $product = Product::where('user_id', $user->id)->get();
        }
        $edit = 0;
        // return $category;
        return view('admin.product.create', compact('user','edit'))->with('categories',$category);
        // return view('admin.product.create')->with('categories',$category);
    }

    public function create_seller()
    {
        $user = Auth::user();
        $category=Category::all();
        if($user->id == 1) {
            $product = Product::all();
        } else {
           $product = Product::where('user_id', $user->id)->get();
        }
        $edit = 0;
        // return $category;
        return view('seller.product.create', compact('user','edit'))->with('categories',$category);
        // return view('admin.product.create')->with('categories',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'string|required',
            'stock'=>"required|numeric",
            'price'=>'required|numeric',
            'cat_id'=>'required|exists:categories,id',
            'photo'=>'required|image|max:2048'
        ]);

        $photo = $request->file('photo');

        $new_name = rand() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('photos'), $new_name);
        $form_data = array(
            'name'             => $request->name,
            'stock'            => $request->stock,
            'price'            => $request->price,
            'cat_id'           => $request->cat_id,
            'user_id'           => $request->user_id,
            'photo'            => $new_name
        );
        // dd($form_data);
        Product::create($form_data);

        return redirect()->route('product.index');

        // $status=Product::create($data);
        // if($status){
        //     request()->session()->flash('success','Product Successfully added');
        // }
        // else{
        //     request()->session()->flash('error','Please try again!!');
        // }
        // console.log($status);
        // return redirect()->route('product.index');

        // $data=$request->all();
        

        // if($request->hasFile('photo')) {
        //     $destination = 'img/uploads/';
        //     $file = $request->file('photo');
        //     $file->move($destination, time().$file->getClientOriginalName());
        //    $data['photo'] = time().$file->getClientOriginalName();

        // } else {
        //     $data['photo'] = "default.jpg";
        // }
        // $status=Product::create($data);
        // if($status){
        //     request()->session()->flash('success','Product Successfully added');
        // }
        // else{
        //     request()->session()->flash('error','Please try again!!');
        // }
        // return redirect()->route('product.index');
    }

    public function store_seller(Request $request)
    {
        $request->validate([
            'name'=>'string|required',
            'stock'=>"required|numeric",
            'price'=>'required|numeric',
            'cat_id'=>'required|exists:categories,id',
            'photo'=>'required|image|max:2048'
        ]);

        $photo = $request->file('photo');

        $new_name = rand() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('photos'), $new_name);
        $form_data = array(
            'name'             => $request->name,
            'stock'            => $request->stock,
            'price'            => $request->price,
            'cat_id'           => $request->cat_id,
            'user_id'           => $request->user_id,
            'photo'            => $new_name
        );
        // dd($form_data);
        Product::create($form_data);

        return redirect()->route('product.index_seller');

        // $status=Product::create($data);
        // if($status){
        //     request()->session()->flash('success','Product Successfully added');
        // }
        // else{
        //     request()->session()->flash('error','Please try again!!');
        // }
        // console.log($status);
        // return redirect()->route('product.index');

        // $data=$request->all();
        

        // if($request->hasFile('photo')) {
        //     $destination = 'img/uploads/';
        //     $file = $request->file('photo');
        //     $file->move($destination, time().$file->getClientOriginalName());
        //    $data['photo'] = time().$file->getClientOriginalName();

        // } else {
        //     $data['photo'] = "default.jpg";
        // }
        // $status=Product::create($data);
        // if($status){
        //     request()->session()->flash('success','Product Successfully added');
        // }
        // else{
        //     request()->session()->flash('error','Please try again!!');
        // }
        // return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $users = User::all();
        $product=Product::findOrFail($id);
        $category=Category::all();
        $items=Product::where('id',$id)->get();
        // return $items;
        return view('admin.product.edit')->with('product',$product)
                    ->with('categories',$category)->with('items',$items);
    }

    public function edit_seller($id)
    {
        $user = Auth::user();
        $users = User::all();
        $product=Product::findOrFail($id);
        $category=Category::all();
        $items=Product::where('id',$id)->get();
        // return $items;
        return view('seller.product.edit')->with('product',$product)
                    ->with('categories',$category)->with('items',$items);
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
        $product=Product::findOrFail($id);
        $this->validate($request,[
            'name'=>'string|required',
            'stock'=>"required|numeric",
            'price'=>'required|numeric',
            'cat_id'=>'required|exists:categories,id',
            'photo'=>'string|required'
        ]);

        $data=$request->all();
        // return $data;
        $status=$product->fill($data)->save();
        if($status){
            request()->session()->flash('success','Product Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('product.index');
    }

    public function update_seller(Request $request, $id)
    {
        $product=Product::findOrFail($id);
        $this->validate($request,[
            'name'=>'string|required',
            'stock'=>"required|numeric",
            'price'=>'required|numeric',
            'cat_id'=>'required|exists:categories,id',
            'photo'=>'string|required'
        ]);

        $data=$request->all();
        // return $data;
        $status=$product->fill($data)->save();
        if($status){
            request()->session()->flash('success','Product Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('product.index_seller');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $status=$product->delete();
        
        if($status){
            request()->session()->flash('success','Product successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting product');
        }
        return redirect()->route('product.index');
    }

    public function destroy_seller($id)
    {
        $product=Product::findOrFail($id);
        $status=$product->delete();
        
        if($status){
            request()->session()->flash('success','Product successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting product');
        }
        return redirect()->route('product.index_seller');
    }
}
