<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Eloquent\Model;

class Cour extends Model
{
    protected $connection = 'mongodb';
}
