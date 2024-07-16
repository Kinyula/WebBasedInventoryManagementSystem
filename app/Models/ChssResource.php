<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChssResource extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'category_id', 'asset_id', 'resource_name', 'status', 'college_name', 'asset_status', 'allocation_status', 'resource_cost', 'repair_status', 'region'];

    protected $casts = ['resource_cost' => 'float'];

    public static function search($search)
    {
        return empty($search) ? static::query() : static::query()

            ->where("college_name", "ILIKE", "%$search%")
            ->orWhere("allocation_status", "ILIKE", "%$search%")
            ->orWhere("status", "ILIKE", "%$search%")
            ->orWhere("asset_status", "ILIKE", "%$search%")
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

    public static function searchRepair($search)
    {
        return empty($search) ? static::query() : static::query()
        ->where("room", "ILIKE", "%$search%")
        ->orWhere("repair_status", "ILIKE", "%$search%")
        ->orWhere("department", "ILIKE", "%$search%")
        ->orWhere("id", "ILIKE", "%$search%");

    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
