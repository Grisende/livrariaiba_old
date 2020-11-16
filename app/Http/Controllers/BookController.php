<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelBook;

class BookController extends Controller
{
    private $objBook;

    public function __construct()
    {
        $this->objBook = new ModelBook();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = $this->objBook->all();
        return view('stock', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create/book');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = $this->objBook->create([
            'title'=>$request->title,
            'purchase_price'=>$request->purchase_price,
            'selling_price'=>$request->selling_price,
            'quantity'=>$request->quantity
        ]);

        if($create){
            return redirect('stock');
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
        $book = $this->objBook->find($id);
        return view('create/book', compact('book'));
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
        $update = $this->objBook->where(['id'=>$id])->update([
            'title'=>$request->title,
            'purchase_price'=>$request->purchase_price,
            'selling_price'=>$request->selling_price,
            'quantity'=>$request->quantity
        ]);

        if($update){
            return redirect('stock');
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
        $del = $this->objBook->destroy($id);

        return($del)?"sim":"não";
    }
}
