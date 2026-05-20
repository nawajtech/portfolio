<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Contact extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = ['name', 'email', 'subject', 'message'];
}
