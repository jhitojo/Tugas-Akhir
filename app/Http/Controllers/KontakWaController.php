<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KontakWa;
use App\User;
use Illuminate\Support\Facades\Auth;

class KontakWaController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();

        if($user->id == 1){
            $kontak_wa = KontakWa::all();
        } else {
            $kontak_wa = KontakWa::where('user_id', $user->id)->get();
        }
        $edit = 0;
        // return $kontak_wa;
        return view('admin.kontak_wa.index', compact('kontak_wa','user','edit'));
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
        if($user->id == 1) {
            $kontak_wa = KontakWa::all();
        } else {
           $kontak_wa = KontakWa::where('user_id', $user->id)->get();
        }
        $edit = 0;
        // return $category;
        return view('admin.kontak_wa.create', compact('user','edit'));
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
        // $request->validate([
        //     'isi_pesan'=>'string|required',
        // ]);

        // $form_data = array(
        //     'user_id'               => $request->user_id,
        //     'isi_pesan '             => $request->isi_pesan ,
           
        // );
        // // dd($form_data);
        // KontakWa::create($form_data);

        // return redirect()->route('kontak_wa.index');

        $this->validate($request,[
            'isi_pesan'=>'string|required',
        ]);
        $data= $request->all();
        
        $status=KontakWa::create($data);
        if($status){
            request()->session()->flash('success','Category successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('kontak_wa.index');
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
        //
        $user = Auth::user();
        $users = User::all();
        $kontak_wa= KontakWa::findOrFail($id);
        $items=$kontak_wa::where('id',$id)->get();
        // return $items;
        return view('admin.kontak_wa.edit')->with('kontak_wa',$kontak_wa)
                    ->with('items',$items);
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
        $kontak_wa=KontakWa::findOrFail($id);
        $this->validate($request,[
            'isi_pesan'=>'string|required',
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
        return redirect()->route('kontak_wa.index');
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
        $kontak_wa=KontakWa::findOrFail($id);
        $status=$kontak_wa->delete();
        
        if($status){
            request()->session()->flash('success','Pesan successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting Pesan');
        }
        return redirect()->route('kontak_wa.index');
    }
}
