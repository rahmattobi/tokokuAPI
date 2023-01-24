<?php

namespace App\Http\Controllers;

use App\Models\checkout;
use App\Models\Produk;
use App\Models\checkout_detail;
use App\Models\cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $riwayat = checkout::join('checkout_details', 'checkout_details.id_checkout', '=', 'checkouts.id')
                ->join('carts', 'carts.id', '=', 'checkout_details.id_cart')
                ->join('produks', 'produks.id', '=', 'carts.id_produk')
                ->where('carts.status','1')
                ->get(['carts.*','checkouts.*', 'produks.nama_produk','produks.harga_produk','produks.image','produks.satuan_produk']);
           
        return  response()->json(['data' => $riwayat]);  
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
        
        $checkout = checkout::create([
            'totalH' => request('totalH'),
            'totalB' => request('totalB')
        ]);

        return response()->json(['data' => $checkout]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(checkout $checkout)
    {
        //
    }
}
