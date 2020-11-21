<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\ModelBook;
Use App\Models\ModelOrder;


class OrderController extends Controller
{

    private $objOrder;
    private $objBook;

    public function __construct()
    {
        $this->objOrder = new ModelOrder();
        $this->objBook = new ModelBook();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = $this->objOrder->all();
        return view('order', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create/order');
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

        $create = $this->objOrder->create([
            'id_book'=>$request->id_book,
            'title'=>$book->title,
            'quantity'=>$request->quantity,
            'customer_name'=>$request->customer_name,
            'status'=>$request->status,
            'obs'=>$request->obs,
        ]);

        if($create){
            return redirect('order');
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
        $order = $this->objOrder->find($id);
        return view('create/order', compact('order'));
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

        $update = $this->objOrder->where(['id'=>$id])->update([
            'id_book'=>$request->id_book,
            'title'=>$book->title,
            'quantity'=>$request->quantity,
            'customer_name'=>$request->customer_name,
            'status'=>$request->status,
            'obs'=>$request->obs,
        ]);

        if($update){
            return redirect('order');
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
        $del = $this->objOrder->destroy($id);

        return($del)?"sim":"não";
    }
}
