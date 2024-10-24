<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable; // Import the Authenticatable interface
use Illuminate\Auth\Authenticatable as AuthenticatableTrait; // Import the Authenticatable trait

class Collector extends Model implements Authenticatable // Implement the Authenticatable interface
{
    use AuthenticatableTrait; // Use the Authenticatable trait

    protected $table = 'collector'; // Make sure this matches your database table name

    protected $fillable = [
        'name',   // Keeping this as it is relevant for mass assignment
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
