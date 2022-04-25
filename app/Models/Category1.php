<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category1 extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories1';
    protected $guarded = [];

    public function sub_ctgs()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
}
