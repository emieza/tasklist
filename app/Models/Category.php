<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /*
     * camí contrari a la FK de tasks: llista de tasques relacionades amb la categoria
     * https://cacauet.org/wiki/index.php/Laravel#Accedint_relacions_1-N_de_forma_inversa
     */
    public function tasks() {
    	return $this->hasMany('App\Models\Task','category_id','id');
    }
}
