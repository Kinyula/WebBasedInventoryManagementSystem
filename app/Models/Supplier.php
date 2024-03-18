<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['company_name', 'company_location'];

    public static function search($search)
    {

        return empty($search) ? static::query() : static::query()

            ->where("company_name", "ILIKE", "%$search%")
            ->orWhere("company_location", "ILIKE", "%$search%");
    }

    public function phone()
    {
        return $this->hasMany(SupplierContactPhoneNumber::class);
    }

    public function services()
    {
        return $this->hasMany(SupplierOfferedService::class);
    }
}
