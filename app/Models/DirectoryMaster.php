<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectoryMaster extends Model
{
    protected $table = 'directory_master';
    protected $fillable = ['name', 'area', 'designation', 'twitter', 'email', 'contact', 'language', 'category'];
}
