<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
use Carbon\Carbon;
use App\Order;
use App\OrderDetail;
use DateTime;
use SweetAlert;
use App\User;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
      $this->middleware('auth');
    }


    public function index($id)
    {
        $product = Product::where('id', $id)->first();
        return view('frontend/order', compact('product'));
    }

    public function order(Request $request, $id)
    {
        //dd($request);
        $product = Product::where('id', $id)->first();
        $tanggal = Carbon::now();

        //validasi > stok
        if($request->jumlah > $product->stock)
        {
            return redirect('order/'.$id);
        }


        //cek validasi
        $cek_order = Order::where('user_id', Auth::user()->id)->where('status_pembayaran',0)->first();

        //simpan database order
        if(empty($cek_order))
        {
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->tanggal = $tanggal;
            $order->status_pembayaran = 0;
            $order->total_harga = 0;
            $order->save();
        }
        

        //simpan ke db order_detail
        $new_order = Order::where('user_id', Auth::user()->id)->where('status_pembayaran',0)->first();
    
        //cek pesanan detail

        $cek_order_detail = OrderDetail::where('product_id',$product->id)->where('order_id',$new_order->id)->first();

        if(empty($cek_order_detail))
        {
            $order_detail = new OrderDetail;
            $order_detail->product_id = $product->id;
            $order_detail->order_id = $new_order->id;
            $order_detail->jumlah = $request->jumlah;
            $order_detail->jumlah_harga = $product->price * $request->jumlah;
            $order_detail->save();

            
        }else
        {
            $order_detail = OrderDetail::where('product_id',$product->id)->where('order_id',$new_order->id)->first();
            $order_detail->jumlah = $order_detail->jumlah + $request->jumlah;
            
            //harga baru 
            $harga_order_detail_baru = $product->price * $request->jumlah;
            $order_detail->jumlah_harga = $order_detail->total_harga+$harga_order_detail_baru;
            $order_detail->update();

        }
        
        //jumlah total
        $order = Order::where('user_id', Auth::user()->id)->where('status_pembayaran',0)->first();
        $order->total_harga = $order->total_harga + $product->price * $request->jumlah;
        $order->update();

        return redirect ('home')->with('sukses', 'product Ditambahkan ke Keranjang');
        
    }

    public function checkout()
    {
        
        $order = Order::where('user_id', Auth::user()->id)->where('status_pembayaran',0)->first();
        if (!empty($order))
        {
            $order_detail = OrderDetail::where('order_id',$order->id)->get();
            return view('frontend.checkout', compact('order','order_detail'));
        }
        return view('frontend.checkout');
        
    }

    public function delete($id)
    {
        $order_detail = OrderDetail::where('id',$id)->first();
        $order = Order::where('id', $order_detail->order_id)->first();
        $order->total_harga = $order->total_harga - $order_detail->jumlah_harga;
        $order->update();
        
        $order_detail->delete();
        
        return redirect ('checkout')->with('sukses', 'order Berhasil dihapus');
    }

    public function konfirmasi_ubah()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status_pembayaran',0)->first();
        return view('frontend.konfirmasi')->with('order',$order);
    }

    public function konfirmasi_update(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $order = Order::where('user_id', Auth::user()->id)->where('status_pembayaran',0)->first();
        $order->status_cod = $request->status_cod;
        $order->update();
        // $order=Order::all();
        // $data= $request->all();
        // return $data;
        return redirect('konfirmasi')->with('sukses', 'Pengajuan Berhasil');
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
