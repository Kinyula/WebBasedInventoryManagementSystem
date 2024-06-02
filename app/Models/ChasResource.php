<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChasResource extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'category_id', 'asset_id', 'resource_name', 'status', 'college_name', 'asset_status', 'allocation_status'];


    public static function search($search)
    {
        return empty($search) ? static::query() : static::query()

            ->where("allocation_status", "ILIKE", "%$search%")
            ->OrWhere("college_name", "ILIKE", "%$search%")
            ->orWhere("asset_status", "ILIKE", "%$search%")
            ->orWhere("resource_name", "ILIKE", "%$search%")
            ->orWhere("id", "ILIKE", "%$search%");
    }

    public static function searchResource($search)
    {
        return empty($search) ? static::query() : static::query()
            ->where("resource_name", "ILIKE", "%$search%")
            ->orWhere("id", "ILIKE", "%$search%");
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public function assets()
    {

        return $this->belongsTo(Asset::class, 'asset_id', 'id');
    }

    public function chssResources()
    {
        return $this->belongsTo(ChssResource::class, 'chss_resource_id', 'id');
    }

    public function areaOfAllocation()
    {

        return $this->hasMany(AreaOfAllocation::class);
    }
}
