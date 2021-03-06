<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category1 extends Model
{
    protected $primaryKey = 'unique_id';
    public $incrementing = false;

    public function category2s()
    {
        return $this->hasMany(Category2::class);
    }
}
