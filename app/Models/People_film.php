<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People_film extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'people_films';
    protected $fillable = ['pf_pid','pf_fid'];
}
