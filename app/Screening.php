<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Screening extends Model
{
    use SoftDeletes;
    protected $table = 'screening';
}
