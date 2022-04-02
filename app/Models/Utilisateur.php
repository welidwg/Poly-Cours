<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Eloquent\Model;

class Utilisateur extends Model
{
    protected $connection = 'mongodb';
}

