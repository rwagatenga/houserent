<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    //

    use SoftDeletes;

    protected $table = 'properties';

    protected $date = ['deleted_at'];
}
