<?php

namespace App\Http\Controllers\Item;

use App\Models\Item\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ItemController extends ApiController {

  /**
   * Validation rules.
   *
   * @var array
   */
  protected $rules = [
    'user_id' => 'sometimes|exists:Users,id|integer|required',
    'type_id' => 'sometimes|exists:ItemTypes,id|integer|required',
    'brand_id' => 'sometimes|exists:Brands,id|integer|required'
  ];

  /**
   * Setup the new controller instance.
   */
  public function __construct(){

    $this->authorizeResource(Item::class);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){

    return $this->successResponse(Item::all());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){

    $input = $request->validate($this->rules);
    $item = Item::create($input)->load('type', 'brand');
    return $this->successResponse($item);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Item\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function show(Item $item){

    return $this->successResponse($item);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Item\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Item $item){

    $item->customUpdate($this->rules)->load('type', 'brand');
    return $this->successResponse($item);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Item\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function destroy(Item $item){

    $item->delete();
    $item->resetAutoIncrement();
    return $this->successResponse($item);
  }
}
