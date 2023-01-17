<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'amount',
        'currency',
        'created_at',
        'updated_at',
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'receiver_id');
}
}
