<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'asset_type','asset_status','asset_cost', 'supplier_id', 'user_id'];

    protected $casts = ['asset_cost' => 'float'];

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

    public function supplier(){

        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');

    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id', 'id');
        
    }
}
