<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\OrderDetail;
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
        $user = User::all();
        $order = Order::orderBy('tanggal','desc')->get();
        
        return view('admin.transaksi.index', compact('order'));
    }

    public function konfirmasi_cod(Request $request, $id)
    {
       //dd($request->all());
        $order = Order::where('id',$request->id)->update([
            'status_cod' => $request->status_cod
        ]);
        
        return redirect('transaksi')->with('sukses', 'Berhasil');
    }
    
    public function konfirmasi_transaksi(Request $request, $id)
    {
       //dd($request->all());
        $order = Order::where('id',$request->id)->update([
            'status_pembayaran' => $request->status_pembayaran
        ]);
        
        return redirect('transaksi')->with('sukses', 'Berhasil');
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
