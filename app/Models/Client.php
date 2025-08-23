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

    protected static function booted()
    {
        static::creating(function ($client) {
            do {
                // Generate a random alphanumeric string, 8 chars long
                $randomRef = 'SC-' . strtoupper(Str::random(8));
            } while (static::where('client_ref', $randomRef)->exists());

            $client->client_ref = $randomRef;
        });
    }

    public function setDocumentsAttribute($value)
    {
        $attribute_name = "documents";
        $disk = "public";
        $destination_path = "documents/clients";

        // Get the current documents (if any)
        $current_documents = $this->{$attribute_name} ?? [];

        // Initialize array for new uploaded files
        $new_uploaded_files = [];

        // Check if new files are being uploaded
        if (request()->hasFile($attribute_name)) {
            foreach (request()->file($attribute_name) as $file) {
                if ($file && $file->isValid()) {
                    // Generate a new file name
                    $new_file_name = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();

                    // Move the new file to the correct path
                    $file_path = $file->storeAs($destination_path, $new_file_name, $disk);

                    // Add the path to the new uploaded files array
                    $new_uploaded_files[] = $file_path;
                }
            }
        }

        // Merge existing documents with new uploaded files
        $all_documents = array_merge($current_documents, $new_uploaded_files);

        // Remove any duplicates and empty values
        $all_documents = array_unique(array_filter($all_documents));

        // Save the merged array
        $this->attributes[$attribute_name] = !empty($all_documents) ? json_encode($all_documents) : null;
    }

    public function getDocumentsAttribute($value)
    {
        $decoded = json_decode($value, true);
        return is_array($decoded) ? array_filter($decoded) : [];
    }

    // Optional: Add a method to remove specific documents
    public function removeDocument($file_path)
    {
        $documents = $this->documents;
        $documents = array_filter($documents, function($doc) use ($file_path) {
            return $doc !== $file_path;
        });

        $this->documents = $documents;
        $this->save();
    }




}
