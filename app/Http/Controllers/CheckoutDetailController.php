<?php

namespace App\Http\Controllers;

use App\Models\checkout_detail;
use Illuminate\Http\Request;
use App\Models\checkout;
use App\Models\cart;

class CheckoutDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = checkout::paginate(10)->last();
        $data = cart::where('status','0')->pluck('id')->toArray();
        return $data;
        // return $data;
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
    public function store()
    {
        $data = checkout::paginate(10)->last();
        $cart = cart::where('status','0')->pluck('id')->toArray();

        foreach ($cart as $key => $value) {
            $checkoutD = checkout_detail::create([
                'id_checkout' => $data->id,
                'id_cart' => $value
            ]);
        }

        return response()->json(['data' => $checkoutD]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\checkout_detail  $checkout_detail
     * @return \Illuminate\Http\Response
     */
    public function show(checkout_detail $checkout_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\checkout_detail  $checkout_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(checkout_detail $checkout_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\checkout_detail  $checkout_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, checkout_detail $checkout_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\checkout_detail  $checkout_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(checkout_detail $checkout_detail)
    {
        //
    }
}
