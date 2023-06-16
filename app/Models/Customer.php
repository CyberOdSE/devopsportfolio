<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{


    protected $fillable = ['name', 'address1', 'address2', 'truck_id', 'week4', 'week3', 'week2', 'week1', 'weekcr'];
}
