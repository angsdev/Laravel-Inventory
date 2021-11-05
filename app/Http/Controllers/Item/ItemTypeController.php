<?php

namespace App\Http\Controllers\Item;

use App\Models\Item\Item;
use App\Models\Item\ItemType;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ItemTypeController extends ApiController {

  /**
   * Validation rules.
   *
   * @var array
   */
  protected $rules = [
    'type_id' => 'exists:ItemTypes,id|integer|required'
  ];

  /**
   * Setup the new controller instance.
   */
  public function __construct(){

    $this->authorizeResource(Item::class);
    $this->authorizeResource(ItemType::class);
  }

  /**
   * Display a listing of the resource.
   *
   * @param  \App\Models\Item\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function index(Item $item){

    return $this->successResponse($item->type);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Item\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Item $item){

    $input = $request->validate($this->rules);
    $item->update($input);
    $item->load('type');
    return $this->successResponse($item);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Item\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function destroy(Item $item){

    $item->update(['type_id' => null]);
    $item->load('type');
    return $this->successResponse($item);
  }
}
