<?php

namespace App\Http\Controllers;
use App\Models\cart;
use App\Models\produk;

use Illuminate\Http\Request;

class CartController extends Controller
{
     public function index()
    {
        $cart = cart::join('produks', 'carts.id_produk', '=', 'produks.id')
                ->where('carts.status','0')
                ->get(['carts.*', 'produks.nama_produk','produks.harga_produk','produks.image','produks.satuan_produk']);
        return  response()->json(['data' => $cart]);
    }

    public function store()
    {
        $cart = cart::where('id_produk',request('id_produk'))
                 ->first();
        if ($cart) {
            $cart->increment('jumlah');
            $cart->save();
            
            return response()->json(['data' => $cart]);

        }else {
            $cart = cart::create([
                    'id_user' =>request('id_user'),
                    'id_produk' =>request('id_produk'),
                    'jumlah' =>request('jumlah'),
                    'status' =>request('status')
                ]); 
                return response()->json(['data' => $cart]);
        }
            
        // }
        // foreach ($products as $key => $value) {
        //     if ($value->id == request('id_produk')) {
        //         return $value->id;
        //     }else{
        //         $cart = cart::create([
        //             'id_user' =>request('id_user'),
        //             'id_produk' =>request('id_produk'),
        //             'jumlah' =>request('jumlah'),
        //             'status' =>request('status')
        //         ]); 
        //         return response()->json(['data' => $cart]);
        //     }
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
        return response()->json(['data' => $cart]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update( cart $cart)
    {
        $cart-> jumlah = request('jumlah');
        $cart-> status = request('status');
        $cart->save();

        return response()->json(['data' => $cart],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(cart $cart)
    {
        //
        $cart-> delete();
        return response()->json(['message' => 'produk berhasil di hapus'],200);

    }
}
