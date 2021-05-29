<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BookAuthor extends Model
{

    
    protected $table = "tblauthors";

    protected $fillable = [
        'id','fullname', 'gender' , 'birthday'
    ];

    public $timestamps = false;
    protected $primaryKey = "id";

}
