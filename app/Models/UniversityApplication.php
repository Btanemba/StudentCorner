<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityApplication extends Model
{
    use CrudTrait;
    use HasFactory;

    // Fillable fields
    protected $fillable = [
        'client_id',
        'university_id',
        'degree',
        'status',
    ];

    // Relationship to Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id');
    }
}
