<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seed_plan extends Model
{
    use HasFactory;
    protected $table = 'seed_plan';
    public $timestamps = false;
}
