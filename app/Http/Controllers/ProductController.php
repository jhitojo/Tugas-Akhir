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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'string|required',
            'stock'=>"required|numeric",
            'price'=>'required|numeric',
            'cat_id'=>'required|exists:categories,id',
            'photo'=>'string|required'
        ]);

        // $data=$request->all();
        $data['name'] = $request->input('name');
        $data['cat_id'] = $request->input('cat_id');
        $data['user_id'] = $request->input('user_id');
        $data['stock'] = $request->input('stock');
        $data['price'] = $request->input('price');
<<<<<<< HEAD
        $data['photo'] = $request->input('photo');
=======

        if($request->hasFile('photo')) {
            $destination = 'img/uploads/';
            $file = $request->file('photo');
            $file->move($destination, time().$file->getClientOriginalName());
           $data['photo'] = time().$file->getClientOriginalName();

        } else {
            $data['photo'] = "default.jpg";
        }
>>>>>>> f683db7ee6d1f8a9265afabcf9d2e8e1b6daeb71
        $status=Product::create($data);
        if($status){
            request()->session()->flash('success','Product Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('product.index');
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
}
