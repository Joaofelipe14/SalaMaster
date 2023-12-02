<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiasSemanas extends Model
{
    use HasFactory;

    protected $fillable = ['domingo' , 'segunda' , 'terca' , 'quarta' , 'quinta' , 'sexta' ,'sabado'];

}
