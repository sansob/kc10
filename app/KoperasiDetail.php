<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class KoperasiDetail extends Model
{
    use SoftDeletes;
    protected $table = 'koperasi_detail';
}
