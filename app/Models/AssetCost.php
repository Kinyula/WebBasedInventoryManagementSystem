<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetCost extends Model
{
    use HasFactory;

    protected $casts = [
        'cost' => 'float'
    ];

        public static function search($search)
    {
        return empty($search) ? static::query() : static::query()

            ->where("asset_type", "ILIKE", "%$search%")
            ->orWhere("asset_status", "ILIKE", "%$search%")
            ->orWhere("id", "ILIKE", "%$search%");
    }
    protected $fillable = ['asset_id', 'cost'];

    public function asset(){

        return $this->belongsTo(Asset::class, 'asset_id', 'id');

    }
}
