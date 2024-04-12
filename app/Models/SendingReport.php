<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendingReport extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'college_name', 'report_file','resource_image'];

    public static function search($search){

        if (auth()->user()->college_name == 'Not set') {

            return empty($search) ? static::query() : static::query()
            ->where('college_name','ILIKE','%'.$search.'%');

        }

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
