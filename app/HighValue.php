<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HighValue extends Model
{
    protected $table = 'highvalues';
    protected $fillable = ['type','name','price','new','ownerID','Auction_type','location','Guarant','image','status'];
}
