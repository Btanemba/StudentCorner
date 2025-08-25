<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'clients';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
   protected $fillable = [
        'first_name',
        'last_name',
        'created_email',
        'created_password',
        'university_applied',
        'degree',
        'status',
        'staff_handler',
        'created_by',
        'updated_by',
         'documents',
    ];
    // protected $hidden = [];

    protected $casts = [
        'documents' => 'array', // for JSON storage
    ];

    protected $attributes = [
        'documents' => '[]',
    ];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
        public function getFullNameAttribute()
{
    return $this->first_name . ' ' . $this->last_name;
}


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function applications()
    {
        return $this->hasMany(UniversityApplication::class);
    }

    // Relationships
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    // protected static function booted()
    // {
    //     static::creating(function ($client) {
    //         do {
    //             // Generate a random alphanumeric string, 8 chars long
    //             $randomRef = 'SC-' . strtoupper(Str::random(8));
    //         } while (static::where('client_ref', $randomRef)->exists());

    //         $client->client_ref = $randomRef;
    //     });
    // }

    protected static function booted()
{
    parent::boot();

    static::creating(function ($client) {
        $client->created_by = auth()->id();
    });

    static::updating(function ($client) {
        $client->updated_by = auth()->id();
    });

    // keep your client_ref generator too
    static::creating(function ($client) {
        do {
            $randomRef = 'SC-' . strtoupper(Str::random(8));
        } while (static::where('client_ref', $randomRef)->exists());

        $client->client_ref = $randomRef;
    });
}

   // Handle file upload for multiple documents
    public function setDocumentsAttribute($value)
    {
        $attribute_name = "documents";
        $disk = "public";
        $destination_path = "uploads/documents";

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }



}
