<?php

namespace App\Http\Controllers\Item\Detail;

use Illuminate\Http\Request;
use App\Models\Item\DetailType;
use App\Http\Controllers\ApiController;

class TypeController extends ApiController {

  /**
   * Validation rules.
   *
   * @var array
   */
  protected $rules = [
    'name' => 'sometimes|unique:DetailTypes,name|string|required',
    'description' => 'sometimes|string|nullable'
  ];

  /**
   * Setup the new controller instance.
   */
  public function __construct(){

    $this->authorizeResource(DetailType::class);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){

    return $this->successResponse(DetailType::all());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){

    $input = $request->validate($this->rules);
    $type = DetailType::create($input);
    return $this->successResponse($type);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Item\DetailType  $type
   * @return \Illuminate\Http\Response
   */
  public function show(DetailType $type){

    return $this->successResponse($type);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\\Item\DetailType  $type
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, DetailType $type){

    $type->customUpdate($this->rules);
    return $this->successResponse($type);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Item\DetailType  $type
   * @return \Illuminate\Http\Response
   */
  public function destroy(DetailType $type){

    $type->delete();
    $type->resetAutoIncrement();
    return $this->successResponse($type);
  }
}
