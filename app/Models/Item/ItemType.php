<?php

namespace App\Models\Item;

use App\Models\Item\Item;
use App\Traits\ModelHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemType extends Model {

  use ModelHelpers, HasFactory;

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'ItemTypes';


  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'description'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'pivot',
  ];

  /**
   * Get items associated with the item type.
   *
   * @return hasMany
   */
  public function items(){

    return $this->hasMany(Item::class);
  }
}
