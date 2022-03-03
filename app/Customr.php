<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Customr extends Model
{
    use Notifiable; 
   
   	protected $guarded = [];
    public function department()
    {
    	return $this->belongsTo(Department::class);
    }

    public function doctor()
    {
    	return $this->belongsTo(Doctor::class);
    }

}
