<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $table = 'peoples';
    protected $fillable = ['p_name','p_skincolor','p_mass','p_gender','p_haircolor','p_height','p_eyecolor','p_dob','p_no_of_films','p_peoplenumber','p_starships','p_vehicles'];
}
