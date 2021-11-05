<?php

namespace App\Models\Item;

use App\Models\Item\Brand;
use App\Models\Item\Detail;
use App\Traits\ModelHelpers;
use App\Models\Item\ItemType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model {

  use ModelHelpers, HasFactory;

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'Items';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'type_id',
    'brand_id',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'user_id',
    'type_id',
    'brand_id',
    'pivot',
  ];

  /**
   * The relations to eager load on every query.
   *
   * @var array
   */
  protected $with = [
    'type',
    'brand',
    'details'
  ];

  /**
   * Get details associated with the item.
   *
   * @return belongsTo
   */
  public function details(){

    return $this->hasMany(Detail::class);
  }

  /**
   * Get item type associated with the item.
   *
   * @return belongsTo
   */
  public function type(){

    return $this->belongsTo(ItemType::class);
  }

  /**
   * Get brand associated with the item.
   *
   * @return belongsTo
   */
  public function brand(){

    return $this->belongsTo(Brand::class);
  }
}
