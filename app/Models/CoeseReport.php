<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoeseReport extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','co_e_s_e_resource_id','description','resource_image','college_name'];
}
