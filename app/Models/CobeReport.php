<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CobeReport extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','co_b_e_resource_id','description','resource_image','college_name'];

    public static function search($search)
    {
        return empty($search) ? static::query() : static::query()

            ->where("description", "ILIKE", "%$search%")
            ->orWhere("college_name", "ILIKE", "%$search%")
            ->orWhere("id", "ILIKE", "%$search%");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cobeResources()
    {
        return $this->belongsTo(CoBEResource::class,'co_b_e_resource_id','id');
    }

    public function category()
    {

        return $this->belongsTo(Category::class);
    }


    public function assets()
    {

        return $this->belongsTo(Asset::class,'asset_id', 'id');
    }
}
