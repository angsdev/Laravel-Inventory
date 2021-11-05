<?php

namespace App\Http\Controllers\Item;

use App\Models\Item\Item;
use App\Models\Item\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ItemBrandController extends ApiController {

  /**
   * Validation rules.
   *
   * @var array
   */
  protected $rules = [
    'brand_id' => 'exists:Brands,id|integer|required'
  ];

  /**
   * Setup the new controller instance.
   */
  public function __construct(){

    $this->authorizeResource(Item::class);
    $this->authorizeResource(Brand::class);
  }

  /**
   * Display a listing of the resource.
   *
   * @param  \App\Models\Item\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function index(Item $item){

    return $this->successResponse($item->brand);
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
    $item->load('brand');
    return $this->successResponse($item);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Item\Item  $item
   * @return \Illuminate\Http\Response
   */
  public function destroy(Item $item){

    $item->update(['brand_id' => null]);
    $item->load('brand');
    return $this->successResponse($item);
  }
}
