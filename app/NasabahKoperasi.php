<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class NasabahKoperasi extends Model
{
    use SoftDeletes;
    protected $table = 'nasabah_koperasi';
}
