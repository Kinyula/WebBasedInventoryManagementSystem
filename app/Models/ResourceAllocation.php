<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceAllocation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'asset_id', 'asset_quantity', 'resource_allocated_college', 'status', 'asset_status'];

    public static function search($search)
    {
        return empty($search) ? static::query() : static::query()

            ->where("resource_allocated_college", "ILIKE", "%$search%")
            ->orWhere("id", "ILIKE", "%$search%");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assets()
    {

        return $this->belongsTo(Asset::class, 'asset_id', 'id');

    }
}
