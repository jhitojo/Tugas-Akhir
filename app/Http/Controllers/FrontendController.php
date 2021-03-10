<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        $user = Auth::user();
        $category = Category::all();
        $product = Product::all();
        return view('frontend.home', compact('product','category','user'));
    }

    public function collection()
    {
        $user = Auth::user();
        $category = Category::all();
        $product = Product::all();
        return view('frontend.collection',compact('product','category','user'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $category = Category::all();
        $product = Category::find($id)->product;
        return view('frontend.collection',compact('category','product','user'));
    }

    public function details($id)
    {
        $user = Auth::user();
        $category = Category::all();
        $product_edit = Product::findOrfail($id);
        return view('frontend.product-details', compact('product_edit','category','user'));
    }

    public function index()
    {
        //
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
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
