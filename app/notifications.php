<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    protected $fillable = ['ownerID','Message','ProductID'];
}
