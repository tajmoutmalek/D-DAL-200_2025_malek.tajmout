<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'start', 'end', 'color'];

    public function getStartAttribute($value)
    {
    	$dateStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->('Y-m-d');
    	$timeStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->('H:i:s');

    	return $this->start = ($timeStart == '00:00:00' ? $dateStart : $value) ;
    }

     public function getEndAttribute($value)
    {
    	$dateEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->('Y-m-d');
    	$timeEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->('H:i:s');

    	return $this->end = ($timeEnd == '00:00:00' ? $dateEnd : $value) ;
    }
}
