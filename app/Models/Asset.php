<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'asset_type','asset_status'];

    public static function search($search)
    {
        return empty($search) ? static::query() : static::query()

            ->where("asset_type", "ILIKE", "%$search%")
            ->orWhere("asset_status", "ILIKE", "%$search%")
            ->orWhere("id", "ILIKE", "%$search%");
    }


    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public function assetStatus()
    {
        return $this->hasOne(Status::class);
    }

    public function resources()
    {
        return $this->hasMany(ResourceAllocation::class);
    }

    public function cost(){

        
        return $this->hasOne(AssetCost::class);

    }
}
