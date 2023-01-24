<?php

namespace App\Http\Controllers;
use App\Models\Produk;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProdukController extends Controller
{
    //
    public function index(){
        $produk = Produk::paginate(10);
        return  response()->json(['data' => $produk]);
    }
    public function store(Request $request){
        
         $produk = Produk::create([
            'nama_produk' => request('nama_produk'),
            'satuan_produk' =>request('satuan_produk'),
            'image' =>request('image'),
            'harga_produk' =>request('harga_produk'),
            'id_user' =>request('id_user'),
        ]); 

        return response()->json(['data' => $produk]);
    }
 
    public function show(Produk $produk){
        return response()->json(['data' => $produk]);
    }
    
    public function update(Produk $produk){
        $produk-> nama_produk = request('nama_produk');
        $produk-> satuan_produk = request('satuan_produk');
        $produk-> harga_produk = request('harga_produk');
        $produk-> image = request('image');
        $produk-> id_user = request('id_user');
        $produk->save();

        return response()->json(['data' => $produk],200);
    }

    public function destroy(Produk $produk){
        $produk-> delete();
        return response()->json(['message' => 'Produk berhasil di hapus'],200);
        
    }
}
