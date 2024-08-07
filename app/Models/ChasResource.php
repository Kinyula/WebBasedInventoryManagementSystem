<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChasResource extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'category_id', 'asset_id', 'resource_name', 'status', 'college_name', 'asset_status', 'allocation_status','resource_cost', 'repair_status', 'region','room'];

    protected $casts = ['resource_cost' => 'float'];


    public static function search($search)
    {


            if (auth()->user()->post == 'store') {
                return empty($search) ? static::query() : static::query()
                ->where("resource_name", "ILIKE", "%$search%")
                ->orWhere("status", "ILIKE", "%$search%")
                ->orWhere("id", "ILIKE", "%$search%");
            }
            elseif (auth()->user()->post == 'Head of department ( HOD )') {
                return empty($search) ? static::query() : static::query()
                ->where("resource_name", "ILIKE", "%$search%")
                ->orWhere("status", "ILIKE", "%$search%")
                ->orWhere("id", "ILIKE", "%$search%");
            } else {
                return empty($search) ? static::query() : static::query()
                ->join('categories', 'categories.id', '=', 'chas_resources.category_id')
                ->where("allocation_status", "ILIKE", "%$search%")
                ->orWhere("categories.category_type", "ILIKE", "%$search%") // Search by category name
                ->orWhere("college_name", "ILIKE", "%$search%")
                ->orWhere("asset_status", "ILIKE", "%$search%")
                ->orWhere("status", "ILIKE", "%$search%")
                ->orWhere("resource_name", "ILIKE", "%$search%")
                ->orWhere("chas_resources.id", "ILIKE", "%$search%")
                ->orWhere("building", "ILIKE", "%$search%")
                ->orWhere("room", "ILIKE", "%$search%");
            }

    }

    public static function searchRepair($search)
    {
        return empty($search) ? static::query() : static::query()
        ->where("repair_status", "=", "Repair")
        ->where("room", "ILIKE", "%$search%")
        ->orWhere("department", "ILIKE", "%$search%")
        ->orWhere("id", "ILIKE", "%$search%");

    }

    public static function searchUnmoved($search)
    {
        return empty($search) ? static::query() : static::query()
        ->where("movement_status", "=", "Not moved")
            ->where("resource_name", "ILIKE", "%$search%")
            ->orWhere("status", "ILIKE", "%$search%")
            ->orWhere("id", "ILIKE", "%$search%");
    }

    public static function searchMoved($search)
    {
        return empty($search) ? static::query() : static::query()
        ->where("allocation_status", "=", "Allocated")
            ->where("resource_name", "ILIKE", "%$search%")
            ->orWhere("status", "ILIKE", "%$search%")
            ->orWhere("id", "ILIKE", "%$search%");
    }

    public static function searchApproved($search)
    {
        return empty($search) ? static::query() : static::query()
        ->where("status", "=", "Approved")
            ->where("resource_name", "ILIKE", "%$search%")
            ->orWhere("status", "ILIKE", "%$search%")
            ->orWhere("id", "ILIKE", "%$search%");
    }

    public static function searchUnApproved($search)
    {
        return empty($search) ? static::query() : static::query()
        ->where("status", "=", "In progress")
            ->where("resource_name", "ILIKE", "%$search%")
            ->orWhere("status", "ILIKE", "%$search%")
            ->orWhere("id", "ILIKE", "%$search%");
    }
    public static function searchResource($search)
    {
        return empty($search) ? static::query() : static::query()
            ->where("resource_name", "ILIKE", "%$search%")
            ->orWhere("status", "ILIKE", "%$search%")
            ->orWhere("id", "ILIKE", "%$search%");
    }

    public static function searchConsumable($search)
    {
        return empty($search) ? static::query() : static::query()
            ->where("consumable_issue_status", "=", "Not issued yet")
            ->where("resource_name", "ILIKE", "%$search%")
            ->orWhere("id", "ILIKE", "%$search%");
    }

    public static function searchResourceInventory($search)
    {
        return empty($search) ? static::query() : static::query()
            ->where("resource_name", "ILIKE", "%$search%")
            ->orWhere("status", "ILIKE", "%$search%")
            ->orWhere("building", "ILIKE", "%$search%")
            ->orWhere("specific_area", "ILIKE", "%$search%")
            ->orWhere("id", "ILIKE", "%$search%");
    }

    public static function searchDefected($search)
    {
        return empty($search) ? static::query() : static::query()
            ->where("repair_status", "=", "Repair")
            ->where("resource_name", "ILIKE", "%$search%")
            ->orWhere("asset_status", "=", "Poor")

            ->orWhere("id", "ILIKE", "%$search%");
    }

    public function allocation()
    {

        return $this->hasMany(AreaOfAllocation::class);
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


}
