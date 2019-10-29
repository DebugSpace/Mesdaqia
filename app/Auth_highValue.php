<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auth_highValue extends Model
{
    protected $table = 'auth_high_values';
    protected $fillable = ['type','name','price','new','ownerID','Auction_type','location','Guarant','image','status'];
}
