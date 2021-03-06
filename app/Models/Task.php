<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /*
     * cal indicar la relació entre models
     * en aquest cas FK
     */
    public function category() {
    	return $this->belongsTo('App\Models\Category','category_id');
    }
}
