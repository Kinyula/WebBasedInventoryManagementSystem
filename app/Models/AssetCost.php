<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetCost extends Model
{
    use HasFactory;

    protected $fillable = ['asset_id', 'cost'];

    public function asset(){

        return $this->hasOne(Asset::class, 'asset_id', 'id');

    }
}
