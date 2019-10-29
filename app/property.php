<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    protected $fillable = ['type','area','street','status','city','new','rental','floors','furnished','rooms','SizeInMeter','price','ownerID','Auction_type','location','Guarant','image'];

}
