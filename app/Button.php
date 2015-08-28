<?php

namespace App;

use App\ButtonBar;
use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    protected $fillable = ['title','button_bar_id','bulletin_GUID','bulletin_name','order','icon'];


    public function buttonBar()
    {
    	return $this->belongsTo('App\ButtonBar');
    }
}
