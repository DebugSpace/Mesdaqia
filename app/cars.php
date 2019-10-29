<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cars extends Model
{
    protected $fillable = ['type','vendor','color','year','new','model','status','price','ownerID','Auction_type','location','Guarant','image'];
}
