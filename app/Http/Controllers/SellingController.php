<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelBook;
use App\Models\ModelSelling;

class SellingController extends Controller
{

    private $objSelling;
    private $objBook;

    public function __construct()
    {
        $this->objSelling = new ModelSelling();
        $this->objBook = new ModelBook();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selling = $this->objSelling->all();
            
        return view('selling', compact('selling'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create/selling');
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

        $create = $this->objSelling->create([
            'id_book'=>$request->id_book,
            'title'=>$book->title,
            'selling_price'=>$book->selling_price,
            'quantity'=>$request->quantity,
            'payment_method'=>$request->payment_method,
            'customer_name'=>$request->customer_name,
            'obs'=>$request->obs
        ]);

        $update = $this->objBook->where(['id'=>$request->id_book])->update([
            'quantity'=>$book->quantity-$request->quantity,
        ]);

        if($create && $update){
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
        $selling = $this->objSelling->find($id);
        return view('create/selling', compact('selling'));
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
        $book = $this->objBook->find($request->id_book);

        $update = $this->objSelling->where(['id'=>$id])->update([
            'id_book'=>$request->id_book,
            'title'=>$book->title,
            'selling_price'=>$book->selling_price,
            'quantity'=>$request->quantity,
            'payment_method'=>$request->payment_method,
            'customer_name'=>$request->customer_name,
            'obs'=>$request->obs
        ]);

        if($update){
            return redirect('selling');
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
        $del = $this->objSelling->destroy($id);

        return($del)?"sim":"não";
    }
}
