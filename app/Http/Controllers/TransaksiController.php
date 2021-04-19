<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\OrderDetail;
use App\KontakWa;
use Illuminate\Http\Request;
use Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = User::all();
        $user_beda = Auth::user();

        if($user_beda->id == 1){
            $kontak_wa = KontakWa::all();
        } else {
            $kontak_wa = KontakWa::where('user_id', $user_beda->id)->get();
        }
        //    $kontak_wa = KontakWa::all();
            // $kontak_wa = KontakWa::where('user_id', $user->id)->get();
        $order = Order::where('pesanan_milik', $user_beda->id)->get();
        // $order = Order::orderBy('tanggal','desc')->get();
        return view('admin.transaksi.index', compact('order','kontak_wa'));
    }

    public function index_seller()
    {
        // $user = User::all();
        $user_beda = Auth::user();

        if($user_beda->id == 1){
            $kontak_wa = KontakWa::all();
        } else {
            $kontak_wa = KontakWa::where('user_id', $user_beda->id)->get();
        }
        //    $kontak_wa = KontakWa::all();
            // $kontak_wa = KontakWa::where('user_id', $user->id)->get();
        $order = Order::where('pesanan_milik', $user_beda->id)->get();
        // $order = Order::orderBy('tanggal','desc')->get();
        return view('seller.transaksi.index', compact('order','kontak_wa'));
    }

    public function konfirmasi_cod(Request $request, $id)
    {
       //dd($request->all());
        $order = Order::where('id',$request->id)->update([
            'status_cod' => $request->status_cod
        ]);
        
        return redirect('transaksi')->with('sukses', 'Berhasil');
    }

    public function konfirmasi_cod_seller(Request $request, $id)
    {
       //dd($request->all());
        $order = Order::where('id',$request->id)->update([
            'status_cod' => $request->status_cod
        ]);
        
        return redirect('transaksi_seller')->with('sukses', 'Berhasil');
    }
    
    public function konfirmasi_transaksi(Request $request, $id)
    {
       //dd($request->all());
        $order = Order::where('id',$request->id)->update([
            'status_pembayaran' => $request->status_pembayaran
        ]);
        
        return redirect('transaksi')->with('sukses', 'Berhasil');
    }

    public function konfirmasi_transaksi_seller(Request $request, $id)
    {
       //dd($request->all());
        $order = Order::where('id',$request->id)->update([
            'status_pembayaran' => $request->status_pembayaran
        ]);
        
        return redirect('transaksi_seller')->with('sukses', 'Berhasil');
    }
    
    public function batal_konfirmasi_transaksi(Request $request, $id)
    {
       //dd($request->all());
        $order = Order::where('id',$request->id)->update([
            'status_pembayaran' => $request->status_pembayaran
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('transaksi');
    }

    public function batal_konfirmasi_transaksi_seller(Request $request, $id)
    {
       //dd($request->all());
        $order = Order::where('id',$request->id)->update([
            'status_pembayaran' => $request->status_pembayaran
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('transaksi_seller');
    }

    
    public function pesanan_detail($id)
    {
        $user = User::all();
      //  $pesanan = Pesanan::orderBy('tanggal','desc')->get();
        $order = Order::all();
       // $pesanan_detail = PesananDetail::orderBy('created_at','desc')->get();
        $order_detail = OrderDetail::where('order_id',$id)->get();
       // $pd = PesananDetail::where

        
        return view('admin.transaksi.transaksi_detail', compact('order','order_detail'));
    }

    public function pesanan_detail_seller($id)
    {
        $user = User::all();
      //  $pesanan = Pesanan::orderBy('tanggal','desc')->get();
        $order = Order::all();
       // $pesanan_detail = PesananDetail::orderBy('created_at','desc')->get();
        $order_detail = OrderDetail::where('order_id',$id)->get();
       // $pd = PesananDetail::where

        
        return view('seller.transaksi.transaksi_detail', compact('order','order_detail'));
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
