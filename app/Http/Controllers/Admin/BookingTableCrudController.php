<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BookingTableRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BookingTableCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BookingTableCrudController extends CrudController
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
        CRUD::setModel(\App\Models\BookingTable::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/booking-table');
        CRUD::setEntityNameStrings('booking table', 'booking tables');

        // Disable create button in list view
        $this->crud->denyAccess('create');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
       // CRUD::setFromDb(); // set columns from db columns.

       CRUD::column('first_name')
        ->label('First Name')
        ->searchLogic(function ($query, $column, $searchTerm) {
            $query->orWhere('first_name', 'like', '%'.$searchTerm.'%');
        });
    
    CRUD::column('last_name')
        ->label('Last Name')
        ->searchLogic(function ($query, $column, $searchTerm) {
            $query->orWhere('last_name', 'like', '%'.$searchTerm.'%');
        });
    
    CRUD::column('country')
        ->label('Country')
        ->searchLogic(function ($query, $column, $searchTerm) {
            $query->orWhere('country', 'like', '%'.$searchTerm.'%');
        });
    
    CRUD::column('email')
        ->type('email')
        ->label('Email')
        ->searchLogic(function ($query, $column, $searchTerm) {
            $query->orWhere('email', 'like', '%'.$searchTerm.'%');
        });
    
    CRUD::column('ambassador')
        ->label('Ambassador')
        ->searchLogic(function ($query, $column, $searchTerm) {
            $query->orWhere('ambassador', 'like', '%'.$searchTerm.'%');
        });
    
    CRUD::column('status')
        ->label('Status')
        ->type('select_from_array')
        ->options([
            'pending' => 'Pending',
            'confirmed' => 'Confirmed',
            'cancelled' => 'Cancelled',
            'completed' => 'Completed'
        ])
        ->searchLogic(function ($query, $column, $searchTerm) {
            $query->orWhere('status', 'like', '%'.$searchTerm.'%');
        });
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(BookingTableRequest::class);
        //CRUD::setFromDb(); // set fields from db columns.

       // Make all fields read-only except status
          CRUD::field([
        'name' => 'first_name',
        'label' => 'First Name',
        'attributes' => [
            'readonly' => 'readonly',
            'style' => 'background-color: #c1bebeff;'
        ],
        'wrapper' => [
            'class' => 'form-group col-md-6'
        ]
    ]);
    
    CRUD::field([
        'name' => 'last_name',
        'label' => 'Last Name',
        'attributes' => [
            'readonly' => 'readonly',
             'style' => 'background-color: #c1bebeff;'
        ],
        'wrapper' => [
            'class' => 'form-group col-md-6'
        ]
     ]);
            
    CRUD::field([
        'name' => 'country',
        'label' => 'Country',
        'attributes' => [
            'readonly' => 'readonly',
            'style' => 'background-color: #c1bebeff;'
        ],
        'wrapper' => ['class' => 'form-group col-md-6']
    ]);
    
    CRUD::field([
        'name' => 'city',
        'label' => 'City',
        'attributes' => [
            'readonly' => 'readonly',
            'style' => 'background-color: #c1bebeff;'
        ],
        'wrapper' => ['class' => 'form-group col-md-6']
    ]);

            
        CRUD::field('email')
            ->label('Email')
            ->type('email')
            ->attributes(['readonly' => 'readonly']);
            
        CRUD::field([
        'name' => 'ambassador',
        'label' => 'Ambassador',
        'attributes' => [
            'readonly' => 'readonly',
           'style' => 'background-color: #c1bebeff;'
        ],
        'wrapper' => ['class' => 'form-group col-md-8'] 
    ]);
    
    CRUD::field([
        'name' => 'status',
        'label' => 'Status',
        'type' => 'select_from_array',
        'options' => [
            'pending' => 'Pending',
            'confirmed' => 'Confirmed',
            'cancelled' => 'Cancelled',
            'completed' => 'Completed'
        ],
        'wrapper' => ['class' => 'form-group col-md-4'] // Narrower column for status
    ]);
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
