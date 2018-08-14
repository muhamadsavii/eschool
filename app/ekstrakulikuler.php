<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ekstrakulikuler extends Model
{
    protected $table = 'ekstrakulikulers';
    protected $fillable = ['nama','guru'];
}
