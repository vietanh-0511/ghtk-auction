<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class roleUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'role_users';

    protected $fillable = [
        'role_id',
        'user_id',
    ];
}
