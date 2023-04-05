<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use IIluminate\foundation\Auth\User as Authenticable;

class Admin extends Model
{
    use HasFactory;
    protected $guard = 'admin';
}
