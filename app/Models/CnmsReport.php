<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CnmsReport extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','cnms_resource_id','description','resource_image','college_name'];
}
