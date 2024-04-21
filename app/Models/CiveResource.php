<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CiveResource extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'category_id', 'asset_id', 'resource_name', 'status', 'college_name', 'asset_status'];

    public static function search($search)
    {
        return empty($search) ? static::query() : static::query()

            ->where("college_name", "ILIKE", "%$search%")
            ->orWhere("status", "ILIKE", "%$search%")
            ->orWhere("asset_status", "ILIKE", "%$search%")
            ->orWhere("resource_name", "ILIKE", "%$search%")
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
}
