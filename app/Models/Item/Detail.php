<?php

namespace App\Models\Item;

use App\Models\Item\Item;
use App\Traits\ModelHelpers;
use App\Models\Item\DetailType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detail extends Model {

  use ModelHelpers, HasFactory;

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'Details';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'item_id',
    'type_id',
    'value',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'item_id',
    'type_id',
    'pivot',
  ];

  /**
   * The relations to eager load on every query.
   *
   * @var array
   */
  protected $with = [
    'type'
  ];

  /**
   * Get items associated with the detail.
   *
   * @return belongsTo
   */
  public function item(){

    return $this->belongsTo(Item::class);
  }

  /**
   * Get detail type associated with the detail.
   *
   * @return belongsTo
   */
  public function type(){

    return $this->belongsTo(DetailType::class);
  }
}
