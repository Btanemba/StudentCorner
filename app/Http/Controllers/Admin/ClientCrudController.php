<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Client::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/client');
        CRUD::setEntityNameStrings('client', 'clients');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // set columns from db columns.
        // Client Reference
        CRUD::addColumn([
            'name' => 'client_ref',
            'label' => 'Client Reference',
            'type' => 'text',
        ]);

        // First Name
        CRUD::addColumn([
            'name' => 'first_name',
            'label' => 'First Name',
            'type' => 'text',
        ]);

        // Last Name
        CRUD::addColumn([
            'name' => 'last_name',
            'label' => 'Last Name',
            'type' => 'text',
        ]);

        // Status
        CRUD::addColumn([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'text', // or 'select_from_array' if you want dropdown display
        ]);

        // Staff Handler
        CRUD::addColumn([
            'name' => 'staff_handler',
            'label' => 'Staff Handler',
            'type' => 'text',
        ]);

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ClientRequest::class);
        CRUD::addField([
            'name' => 'client_ref',
            'label' => 'Client Reference',
            'type' => 'text',
            'attributes' => [
                'readonly' => 'readonly', // user cannot edit
            ],
            'wrapper' => [
                'class' => 'form-group col-md-12',
            ],
        ]);
        CRUD::addField([
            'name'  => 'first_name',
            'label' => 'First Name',
            'type'  => 'text',
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ],
        ]);

        CRUD::addField([
            'name'  => 'last_name',
            'label' => 'Last Name',
            'type'  => 'text',
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ],
        ]);

        CRUD::addField([
            'name'  => 'created_email',
            'label' => 'Email',
            'type'  => 'email',
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ],
        ]);

        CRUD::addField([
            'name'  => 'created_password',
            'label' => 'Password',
            'type'  => 'text',
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ],
        ]);


        CRUD::addField([
            'name'  => 'status',
            'label' => 'Status',
            'type'  => 'select_from_array',
            'options' => [
                'Pending'  => 'Pending',
                'Paid' => 'Paid',
                'Complete' => 'Complete',

            ],
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ],
        ]);

        CRUD::addField([
            'name'  => 'staff_handler',
            'label' => 'Staff Handler',
            'type'  => 'select_from_array',
            'options' => [
                'Nneena'  => 'Nneena',
                'Francis' => 'Francis',
                'Benedict' => 'Benedict',
            ],
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ],
            'allows_null' => True,
            'default' => '-',
        ]);

        CRUD::addField([
            'name' => 'documents',
            'label' => 'Upload Documents',
            'type' => 'upload_multiple', // allows multiple files
            'upload' => true,
            'disk' => 'public',
            'wrapper' => [
                'class' => 'form-group col-md-12',
            ],
            'attributes' => [
        'multiple' => 'multiple',
    ],
        ]);
        CRUD::addField([
            'name'  => 'created_by',
            'type'  => 'text',
            'value' => backpack_user()->id ?? null,
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ],
        ]);

        CRUD::addField([
            'name'  => 'updated_by',
            'type'  => 'text',
            'value' => backpack_user()->id ?? null,
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ],
        ]);


        //CRUD::setFromDb(); // set fields from db columns.

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
