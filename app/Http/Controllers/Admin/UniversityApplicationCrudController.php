<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UniversityApplicationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UniversityApplicationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UniversityApplicationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\UniversityApplication::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/university-application');
        CRUD::setEntityNameStrings('university application', 'university applications');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {


       // Client full name
    CRUD::addColumn([
        'name'      => 'client_id',
        'type'      => 'select',
        'label'     => 'Client Name',
        'entity'    => 'client',
        'attribute' => 'full_name',
        'model'     => "App\Models\Client",
    ]);
    CRUD::addColumn([
    'name'      => 'university_id',
    'type'      => 'select',
    'label'     => 'University',
    'entity'    => 'university',
    'attribute' => 'name',
    'model'     => "App\Models\University",
]);

    // Degree
    CRUD::column('degree')->label('Degree');

    // Status
    CRUD::column('status')->label('Status');


    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(UniversityApplicationRequest::class);
        //CRUD::setFromDb(); // set fields from db columns.


    CRUD::addField([
    'label'     => "Client",
    'type'      => 'select',
    'name'      => 'client_id',
    'entity'    => 'client',
    'attribute' => 'full_name',
    'model'     => "App\Models\Client",
    'allows_null' => true,
    'default'     => null,
    'wrapper'   => ['class' => 'form-group col-md-12'],
]);


// University Name as a select field
CRUD::addField([
    'label'     => "University",
    'type'      => 'select',
    'name'      => 'university_id',
    'entity'    => 'university',
    'attribute' => 'name',
    'model'     => "App\Models\University",
    'allows_null' => true,
    'default'     => null,
    'wrapper'   => ['class' => 'form-group col-md-6'],
    'options'   => (function ($query) {
        return $query->orderBy('name', 'ASC')->get();
    }),
]);

  CRUD::addField([
    'name' => 'degree',
    'type' => 'select_from_array',
    'label' => 'Degree',
    'options' => [
        'BSc' => 'BSc',
        'Masters' => 'Masters',
    ],
    'allows_null' => true,   // allow null selection
    'default' => null,       // no default value
    'wrapper' => ['class' => 'form-group col-md-6'],
]);

    // Status
    CRUD::addField([
        'name' => 'status',
        'type' => 'select_from_array',
        'label' => 'Status',
        'options' => ['pending'=>'Pending','Applied'=>'Applied','Accepted'=>'Accepted','Rejected'=>'Rejected'],
        'wrapper' => ['class' => 'form-group col-md-8'],
    ]);

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
