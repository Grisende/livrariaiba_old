<?php

namespace App\Http\Controllers;

use App\Models\ModelPurchase;
use App\Models\ModelBook;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    private $objPurchase;
    private $objBook;

    public function __construct()
    {
        $this->objPurchase = new ModelPurchase();
        $this->objBook = new ModelBook();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase = $this->objPurchase->all();
            
        return view('purchase', compact('purchase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create/purchase');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = $this->objPurchase->create([
            'id_book'=>$request->id_book+1,
            'title'=>$request->title,
            'purchase_price'=>$request->purchase_price,
            'selling_price'=>$request->selling_price,
            'quantity'=>$request->quantity,
            'store'=>$request->store,
            'payment_method'=>$request->payment_method,
            'status'=>$request->status,
            'order'=>$request->order
        ]);

        $create_book = $this->objBook->create([
            'title'=>$request->title,
            'purchase_price'=>$request->purchase_price,
            'selling_price'=>$request->selling_price,
            'quantity'=>$request->quantity
        ]);

        if($create && $create_book){
            return redirect('purchase');
        }
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
        $purchase = $this->objPurchase->find($id);
        return view('create/purchase', compact('purchase'));
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
        $update = $this->objPurchase->where(['id'=>$id])->update([
            'title'=>$request->title,
            'purchase_price'=>$request->purchase_price,
            'selling_price'=>$request->selling_price,
            'quantity'=>$request->quantity,
            'store'=>$request->store,
            'payment_method'=>$request->payment_method,
            'status'=>$request->status,
            'order'=>$request->order
        ]);

        if($update){
            return redirect('purchase');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $del = $this->objPurchase->destroy($id);
    
            return($del)?"sim":"não";
        }
    }
}
