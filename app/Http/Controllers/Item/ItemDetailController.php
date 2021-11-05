<?php

namespace App\Http\Controllers\Item;

use App\Models\Item\Item;
use App\Models\Item\Detail;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ItemDetailController extends ApiController {

  /**
   * Validation rules.
   *
   * @var array
   */
  protected $rules = [
    'type_id' => 'sometimes|exists:DetailTypes,id|integer|required',
    'value' => 'sometimes|string|required',
  ];

  /**
   * Setup the new controller instance.
   */
  public function __construct(){

    $this->authorizeResource(Detail::class);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Item $item){

    return $this->successResponse($item->details);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Item\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, Item $item){

    $input = $request->validate($this->rules);
    $detail = $item->details()->create($input);
    return $this->successResponse($detail);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Item\Item  $item
   * @param  \App\Models\Item\Detail  $detail
   * @return \Illuminate\Http\Response
   */
  public function show(Item $item, Detail $detail){

    $item->isAssociatedWith($detail);
    return $this->successResponse($detail);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Item\Item  $item
   * @param  \App\Models\Item\Detail  $detail
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Item $item, Detail $detail){

    $item->isAssociatedWith($detail);
    $detail->customUpdate($this->rules)->load('type');
    return $this->successResponse($detail);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Item\Item  $item
   * @param  \App\Models\Item\Detail  $detail
   * @return \Illuminate\Http\Response
   */
  public function destroy(Item $item, Detail $detail){

    $item->isAssociatedWith($detail);
    $detail->delete();
    $detail->resetAutoIncrement();
    $item->load('details');
    return $this->successResponse($item);
  }
}
