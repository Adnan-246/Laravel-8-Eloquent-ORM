<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';

    protected $fillable = [
        'category_id',
        'subcategory_name',
        'subcategory_slug',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); //__category_id foreign key __//
    }

    //__Mutators__//
    public function setSubcategoryNameAttribute($value)
    {
      $this->attributes['subcategory_name']=ucfirst($value);
    }
}
