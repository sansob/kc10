<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class JenisKoperasi extends Model
{
    use SoftDeletes;
    protected $table = 'jenis_koperasi';
}
