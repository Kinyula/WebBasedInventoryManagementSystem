<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_type'];

    public function assets()
    {

        return $this->hasMany(Asset::class);
        
    }

    public function cnmsResources()
    {
        return $this->hasMany(CnmsResource::class);
    }
}
