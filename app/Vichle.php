<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vichle extends Model
{
   
   public $table="vichles";
    protected $fillable = ['type','vendor','color','year','new','model','price','status','ownerID','Auction_type','location','Guarant','image','viewers'];
}
