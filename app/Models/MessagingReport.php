<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessagingReport extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'message', 'college_name'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
