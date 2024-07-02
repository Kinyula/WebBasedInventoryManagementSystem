<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetMovementWithinCollege extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'quantity', 'college_name', 'area_of_allocation', 'area_of_allocation_id' , 'specific_area_of_allocations' , 'department'];

}
