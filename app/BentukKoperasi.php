<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BentukKoperasi extends Model
{
    use SoftDeletes;
    protected $table = 'bentuk_koperasi';
}
