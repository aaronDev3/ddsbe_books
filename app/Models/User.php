<?php

 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;

 class User extends Model{

    protected $table = 'tblbooks';
    // column sa table

    protected $fillable = [
        'bookname', 'yearpublish' , 'authorid'
    ];

    public $timestamps = false;
    protected $primaryKey = 'id';

 }