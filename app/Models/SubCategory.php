<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sub_categories';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category1::class, 'category_id', 'id');
    }

    public function sub_sub_ctgs()
    {
        return $this->hasMany(SubSubCategory::class, 'sub_category_id', 'id');
    }
}
