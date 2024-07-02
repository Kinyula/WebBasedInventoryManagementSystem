<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetMovement extends Model
{
    use HasFactory;

    protected $fillable = ['area_allocation_id', 'quantity', 'from', 'to'];

    public function chasAreas(){

        return $this->belongsTo(ChasResource::class , 'chas_resource_id', 'id');

    }

    public static function search($search) {
        return empty($search) ? static::query() : static::query()
        ->where('from', 'ILIKE', '%$search%')
        ->orWhere('to', 'ILIKE', '%$search%');
    }

    public function assetAreaAllocated(){

        return $this->belongsTo(AreaOfAllocation::class, 'area_allocation_id', 'id');
        
    }
}


