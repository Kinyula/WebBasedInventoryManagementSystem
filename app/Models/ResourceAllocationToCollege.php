<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceAllocationToCollege extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'asset_id', 'asset_quantity', 'resource_allocated_college', 'status', 'asset_status'];

    public static function search($search)
    {
        if (auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )') {
            return empty($search) ? static::query() : static::query()
                ->where('resource_allocated_college', '=', 'College of Informatics and Virtual Education ( CIVE )')
                ->where("resource_allocated_college", "ILIKE", "%$search%")
                ->orWhere("asset_id", "ILIKE", "%$search%");
        } elseif (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS )') {
            return empty($search) ? static::query() : static::query()
                ->where('resource_allocated_college', '=', 'College of Natural Mathematical Science ( CNMS )')
                ->where("resource_allocated_college", "ILIKE", "%$search%")
                ->orWhere("id", "ILIKE", "%$search%");
        } elseif (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )') {
            return empty($search) ? static::query() : static::query()
                ->where('resource_allocated_college', '=', 'College of Health and Allied Science ( CHAS )')
                ->where("resource_allocated_college", "ILIKE", "%$search%")
                ->orWhere("id", "ILIKE", "%$search%");
        } elseif (auth()->user()->college_name == 'College of Education ( CoED )') {
            return empty($search) ? static::query() : static::query()
                ->where('resource_allocated_college', '=', 'College of Education ( CoED )')
                ->where("resource_allocated_college", "ILIKE", "%$search%")
                ->orWhere("id", "ILIKE", "%$search%");
        } elseif (auth()->user()->college_name == 'College of Business and Economics ( CoBE )') {
            return empty($search) ? static::query() : static::query()
                ->where('resource_allocated_college', '=', 'College of Business and Economics ( CoBE )')
                ->where("resource_allocated_college", "ILIKE", "%$search%")
                ->orWhere("id", "ILIKE", "%$search%");
        } elseif (auth()->user()->college_name == 'College of Earth Sciences and Engineering ( CoESE )') {
            return empty($search) ? static::query() : static::query()
                ->where('resource_allocated_college', '=', 'College of Earth Sciences and Engineering ( CoESE )')
                ->where("resource_allocated_college", "ILIKE", "%$search%")
                ->orWhere("id", "ILIKE", "%$search%");
        } elseif (auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )') {
            return empty($search) ? static::query() : static::query()
                ->where('resource_allocated_college', '=', 'College of Humanities and Social Science ( CHSS )')
                ->where("resource_allocated_college", "ILIKE", "%$search%")
                ->orWhere("id", "ILIKE", "%$search%");
        } else {
            return empty($search) ? static::query() : static::query()

                ->where("resource_allocated_college", "ILIKE", "%$search%")
                ->orWhere("id", "ILIKE", "%$search%");
        }
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
