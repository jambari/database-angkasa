<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StoreChecklistldRequest as StoreRequest;
use App\Http\Requests\UpdateChecklistldRequest as UpdateRequest;

class ChecklistldCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Checklistld");
        $this->crud->setRoute("admin/pengamatan/checklist-ld");
        $this->crud->setEntityNameStrings('checklist-LD', 'checklist-LD');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        $this->crud->setFromDb();

        $fields = [
            [
                'name' => 'tanggal',
                'label' => 'Tanggal',
                'type' => 'date'
            ], [
                'name' => 'jam01',
                'label' => '1',
                'type' => 'checkbox'
            ], [
                'name' => 'jam02',
                'label' => '2',
                'type' => 'checkbox'
            ], [
                'name' => 'jam03',
                'label' => '3',
                'type' => 'checkbox'
            ], [
                'name' => 'jam04',
                'label' => '4',
                'type' => 'checkbox'
            ], [
                'name' => 'jam05',
                'label' => '5',
                'type' => 'checkbox'
            ], [
                'name' => 'jam06',
                'label' => '6',
                'type' => 'checkbox'
            ], [
                'name' => 'jam07',
                'label' => '7',
                'type' => 'checkbox'
            ], [
                'name' => 'jam08',
                'label' => '8',
                'type' => 'checkbox'
            ], [
                'name' => 'jam09',
                'label' => '9',
                'type' => 'checkbox'
            ], [
                'name' => 'jam10',
                'label' => '10',
                'type' => 'checkbox'
            ], [
                'name' => 'jam11',
                'label' => '11',
                'type' => 'checkbox'
            ], [
                'name' => 'jam12',
                'label' => '12',
                'type' => 'checkbox'
            ], [
                'name' => 'jam13',
                'label' => '13',
                'type' => 'checkbox'
            ], [
                'name' => 'jam14',
                'label' => '14',
                'type' => 'checkbox'
            ], [
                'name' => 'jam15',
                'label' => '15',
                'type' => 'checkbox'
            ], [
                'name' => 'jam16',
                'label' => '16',
                'type' => 'checkbox'
            ], [
                'name' => 'jam17',
                'label' => '17',
                'type' => 'checkbox'
            ], [
                'name' => 'jam18',
                'label' => '18',
                'type' => 'checkbox'
            ], [
                'name' => 'jam19',
                'label' => '19',
                'type' => 'checkbox'
            ], [
                'name' => 'jam20',
                'label' => '20',
                'type' => 'checkbox'
            ], [
                'name' => 'jam21',
                'label' => '21',
                'type' => 'checkbox'
            ], [
                'name' => 'jam22',
                'label' => '22',
                'type' => 'checkbox'
            ], [
                'name' => 'jam23',
                'label' => '23',
                'type' => 'checkbox'
            ], [
                'name' => 'jam24',
                'label' => '24',
                'type' => 'checkbox'
            ]
        ];
        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        $this->crud->addFields($fields, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        $this->crud->setColumnDetails('jam01', ['label' => '1']);
        $this->crud->setColumnDetails('jam02', ['label' => '2']);
        $this->crud->setColumnDetails('jam03', ['label' => '3']);
        $this->crud->setColumnDetails('jam04', ['label' => '4']);
        $this->crud->setColumnDetails('jam05', ['label' => '5']);
        $this->crud->setColumnDetails('jam06', ['label' => '6']);
        $this->crud->setColumnDetails('jam07', ['label' => '7']);
        $this->crud->setColumnDetails('jam08', ['label' => '8']);
        $this->crud->setColumnDetails('jam09', ['label' => '9']);
        $this->crud->setColumnDetails('jam10', ['label' => '10']);
        $this->crud->setColumnDetails('jam11', ['label' => '11']);
        $this->crud->setColumnDetails('jam12', ['label' => '12']);
        $this->crud->setColumnDetails('jam13', ['label' => '13']);
        $this->crud->setColumnDetails('jam14', ['label' => '14']);
        $this->crud->setColumnDetails('jam15', ['label' => '15']);
        $this->crud->setColumnDetails('jam16', ['label' => '16']);
        $this->crud->setColumnDetails('jam17', ['label' => '17']);
        $this->crud->setColumnDetails('jam18', ['label' => '18']);
        $this->crud->setColumnDetails('jam19', ['label' => '19']);
        $this->crud->setColumnDetails('jam20', ['label' => '20']);
        $this->crud->setColumnDetails('jam21', ['label' => '21']);
        $this->crud->setColumnDetails('jam22', ['label' => '22']);
        $this->crud->setColumnDetails('jam23', ['label' => '23']);
        $this->crud->setColumnDetails('jam24', ['label' => '24']);
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

	public function store(StoreRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}

	public function update(UpdateRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}
}
