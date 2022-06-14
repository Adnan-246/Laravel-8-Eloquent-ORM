<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = [
            'country',
            'country_name',
            'country_slug',

     ];

     //__User table's Country Name Join with Country Table__//
     public function user()
     {
         return $this->belongsTo(User::class, 'country'); //__Here, country attribute is foreign key of countries table  __//
     }

}
