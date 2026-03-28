<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmitCard extends Model
{
    protected $table = 'admit_card';
    protected $fillable = ['roll_no','application_no','candidate_name','father_name','date_of_birth','address','gender','caste_category','type_of_disability','image_link','sign_link','test_id'];
}
