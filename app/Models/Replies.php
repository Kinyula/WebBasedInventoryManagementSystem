<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'college_name', 'report_file', 'reply_to_specified_college'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
