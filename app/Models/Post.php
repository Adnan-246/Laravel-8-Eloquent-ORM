<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;


class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'user_id',
        'title',
        'slug',
        'post_date',
        'image',
        'description',
        'tags',
        'status',
    ];

    //__Join with Category Table__//
  public function category()
  {
      return $this->belongsTo(Category::class, 'category_id'); //__category_id foreign key __//
  }

  //__Join with Subcategory table__//
  public function subcategory()
  {
      return $this->belongsTo(Subcategory::class, 'subcategory_id'); //__subcategory_id foreign key __//
  }

  //__Join with User Table__//
  public function user()
  {
      return $this->belongsTo(User::class, 'user_id'); //user_id foreign key __//
  }

}
