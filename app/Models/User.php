<?php

 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;

 class User extends Model{

    protected $table = 'tblauthors';
    // column sa table

    protected $fillable = [
        'fullname', 'gender' , 'birthday'
    ];

    public $timestamps = false;
    protected $primaryKey = 'id';

 }