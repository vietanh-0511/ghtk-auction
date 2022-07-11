<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'roles';

    protected $fillable = [
        'role',
    ];

    public function users(){
        return $this->belongsToMany(User::class,'role_users');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class,'role_permissions');
    }
}
