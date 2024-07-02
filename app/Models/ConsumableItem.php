<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumableItem extends Model
{
    use HasFactory;
    protected $fillable = ['chas_resource_id', 'quantity_issued'];

    public function chasResources()
    {
        return $this->belongsTo(ChasResource::class,'chas_resource_id','id');
    }
}
