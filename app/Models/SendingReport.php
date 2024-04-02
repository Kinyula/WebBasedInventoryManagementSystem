<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendingReport extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'college_name', 'report_file'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
