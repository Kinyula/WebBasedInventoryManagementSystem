<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChasReport extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','chas_resource_id','description','resource_image','college_name'];
}
