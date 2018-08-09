<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswas extends Model
{
    protected $table = 'siswas';
    protected $fillable = ['nama','alamat','kelas'];
}
