<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoEDResource extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'category_id', 'asset_id','resource_name', 'status', 'college_name','asset_status'];
}
