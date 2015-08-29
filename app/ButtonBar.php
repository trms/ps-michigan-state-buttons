<?php

namespace App;

use App\Button;
use Illuminate\Database\Eloquent\Model;

class ButtonBar extends Model
{
    protected $table = 'button_bars';

    protected $fillable = ['zone_GUID','alert_GUID','title'];

    public function buttons()
    {
    	return $this->hasMany('App\Button');
    }

    public function bulletins()
    {
    	return $this->hasMany('App\Button')->lists('bulletin_GUID')->toArray();
    }
}
