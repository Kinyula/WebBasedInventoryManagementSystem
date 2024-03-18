<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'asset_id', 'status'];

    public function assets(){
        return $this->belongsTo(Asset::class);
    }
}
