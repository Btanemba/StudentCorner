<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class University extends Model
{
    use HasFactory, CrudTrait;

    protected $table = 'universities';

    protected $fillable = [
        'name',
        'link',
        'admission_starts',
        'admission_ends',
        'country',
        'requirement',
    ];
}
