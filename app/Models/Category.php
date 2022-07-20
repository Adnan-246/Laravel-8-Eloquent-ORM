<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'category_name',
        'category_slug',

    ];

    //__Mutators__//
    public function setCategoryNameAttribute($value)
    {
      $this->attributes['category_name']=ucfirst($value);
    }
}
