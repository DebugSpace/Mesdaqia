<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auth_property extends Model
{
    protected $table = 'auth_properties';
    protected $fillable = ['type','area','street','city','status','new','rental','floors','furnished','rooms','SizeInMeter','price','ownerID','Auction_type','location','Guarant','image'];

}
