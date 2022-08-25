<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{
    use HasFactory;
    /*protected $fillable = [
        'name',
        'email',
        'phone',
    ];*/
    protected $guarded = false;
    //protected $guarded = ['is_admin']
}
