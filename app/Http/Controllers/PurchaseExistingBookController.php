<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelPurchase;
use App\Models\ModelBook;

class PurchaseExistingBookController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create/purchaseExistingBook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = $this->objBook->find($request->id_book);

        $create = $this->objPurchase->create([
            'id_book'=>$request->id_book,
            'title'=>$book->title,
            'purchase_price'=>$book->purchase_price,
            'selling_price'=>$book->selling_price,
            'quantity'=>$request->quantity,
            'store'=>$request->store,
            'payment_method'=>$request->payment_method,
            'status'=>$request->status,
            'order'=>$request->order
        ]);

        $update = $this->objBook->where(['id'=>$request->id_book])->update([
            'quantity'=>$book->quantity+$request->quantity,
        ]);

        if($create){
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
