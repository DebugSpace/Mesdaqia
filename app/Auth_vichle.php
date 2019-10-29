<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auth_vichle extends Model
{
    protected $fillable = ['type','vendor','color','year','new','model','price','status','ownerID','Auction_type','location','Guarant','image'];

}
