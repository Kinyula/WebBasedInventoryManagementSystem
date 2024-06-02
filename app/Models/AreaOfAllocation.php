<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaOfAllocation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'quantity', 'college_name', 'area_of_allocation', 'chas_resource_id'];

    public static function search($search)

    {
        return empty($search) ? static::query() : static::query()

            ->where("resource", "ILIKE", "%$search%")
            ->orWhere("area_of_allocation", "ILIKE", "%$search%")
            ->orWhere("quantity", "ILIKE", "%$search%")
            ->orWhere("id", "ILIKE", "%$search%");
    }



    public function user()
    {

        return $this->belongsTo(User::class, 'user_id', 'id');

    }

    public function chasAreas(){

        return $this->belongsTo(ChasResource::class , 'chas_resource_id', 'id');
        
    }
}
