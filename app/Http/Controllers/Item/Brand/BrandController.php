<?php

namespace App\Http\Controllers\Item\Brand;

use App\Models\Item\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BrandController extends ApiController {

  /**
   * Validation rules.
   *
   * @var array
   */
  protected $rules = [
    'name' => 'sometimes|unique:Brands,name|string|required',
    'description' => 'sometimes|string|nullable'
  ];

  /**
   * Setup the new controller instance.
   */
  public function __construct(){

    $this->authorizeResource(Brand::class);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){

    return $this->successResponse(Brand::all());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){

    $input = $request->validate($this->rules);
    $brand = Brand::create($input);
    return $this->successResponse($brand);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Item\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function show(Brand $brand){

    return $this->successResponse($brand);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Item\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Brand $brand){

    $brand->customUpdate($this->rules);
    return $this->successResponse($brand);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Item\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function destroy(Brand $brand){

    $brand->delete();
    $brand->resetAutoIncrement();
    return $this->successResponse($brand);
  }
}
