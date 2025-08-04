<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingTable extends Model
{
    use CrudTrait;
    protected $table = 'booking_table'; // Specify your table name if it's not the default

    protected $fillable = ['first_name','last_name','country','city', 'email', 'ambassador','status',]; // Add all the fields you want to make mass assignable
}
