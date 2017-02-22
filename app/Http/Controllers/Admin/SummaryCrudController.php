<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StoreSummaryRequest as StoreRequest;
use App\Http\Requests\UpdateSummaryRequest as UpdateRequest;

class SummaryCrudController extends CrudController {

    public function setUp() {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Models\Summary");
        $this->crud->setRoute("admin/pengamatan/summary");
        $this->crud->setEntityNameStrings('Summary', 'Summary');

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
                'type' => 'date_picker',
                //'id' => 'tanggal_summary'
                'date_picker_options' => [
                    'todayBtn' => 'true',
                    'format' => 'dd-mm-yyyy'
                ]
            ],[
                'name' => 'stroke',
                'label' => 'Stroke',
                'type' => 'number',
            ]
            ,[
                'name' => 'average_stroke',
                'label' => 'ave/mnt',
                'type' => 'text',
            ],[
                'name' => 'flash',
                'label' => 'Flash',
                'type' => 'number',
            ],[
                'name' => 'average_flash',
                'label' => 'ave/mnt',
                'type' => 'text',
            ],[
                'name' => 'noise',
                'label' => 'Noise',
                'type' => 'number',
            ],[
                'name' => 'average_noise',
                'label' => 'ave/mnt',
                'type' => 'text',
            ],[
                'name' => 'energy',
                'label' => 'Energy',
                'type' => 'number',
            ],[
                'name' => 'average_energy',
                'label' => 'ave/mnt',
                'type' => 'text',
            ],[
                'name' => 'peak_stroke',
                'label' => 'Stroke peak',
                'type' => 'number',
            ],[
                'name' => 'time_stroke',
                'label' => 'Stroke Time',
                'type' => 'timespinner',
                'id' => 'idStrokeTime'
            ],[
                'name' => 'peak_flash',
                'label' => 'Flash peak',
                'type' => 'number',
            ],[
                'name' => 'time_flash',
                'label' => 'Flash Time',
                'type' => 'timespinner',
                'id' => 'idFlashTime'
            ],[
                'name' => 'peak_noise',
                'label' => 'Noise peak',
                'type' => 'number',
            ],[
                'name' => 'time_noise',
                'label' => 'Noise Time',
                'type' => 'timespinner',
                'id' => 'idNoiseTime'
            ],[
                'name' => 'peak_energy',
                'label' => 'Energy peak',
                'type' => 'number',
            ],[
                'name' => 'time_energy',
                'label' => 'Energy Time',
                'type' => 'timespinner',
                'id' => 'idEnergyTime'
            ],[
                'name' => 'energy_ratio',
                'label' => 'Energy ratio',
                'type' => 'number',
            ],[
                'name' => 'time_ratio',
                'label' => 'Energy Ratio Time',
                'type' => 'timespinner',
                'id' => 'idRatioTime'
            ],[
                'name' => 'peak_signal',
                'label' => 'Signal peak',
                'type' => 'number',
            ],[
                'name' => 'time_signal',
                'label' => 'Signal Time',
                'type' => 'timespinner',
                'id' => 'idSignalTime'
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
        //$this->crud->removeColumn('column_name'); // remove a column from the stack
        //$this->crud->removeColumns( ['peak_stroke' , 'time_stroke', 'peak_flash', 'time_flash', 'peak_noise', 'time_noise', 'peak_energy', 'time_energy', 'energy_ratio', 'time_ratio', 'peak_signal', 'time_signal']
        //);
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        $this->crud->setColumnsDetails('average_stroke', ['label'=>'ave/mnt']);
        $this->crud->setColumnsDetails('average_flash',['label'=>'ave/mnt']);
        $this->crud->setColumnsDetails('average_noise',['label'=>'ave/mnt']);
        $this->crud->setColumnsDetails('average_energy',['label'=>'ave/mnt']);
        $this->crud->setColumnsDetails('peak_stroke',['label'=>'Stroke peak']);
        $this->crud->setColumnsDetails('time_stroke',['label'=>'Time']);
        $this->crud->setColumnsDetails('peak_flash',['label'=>'Flash peak']);
        $this->crud->setColumnsDetails('time_flash',['label'=>'Time']);
        $this->crud->setColumnsDetails('peak_noise',['label'=>'Noise peak']);
        $this->crud->setColumnsDetails('time_noise',['label'=>'Time']);
        $this->crud->setColumnsDetails('peak_energy',['label'=>'Energy Peak']);
        $this->crud->setColumnsDetails('time_energy',['label'=>'Time']);
        $this->crud->setColumnsDetails('energy_ratio',['label'=>'Energy ratio']);
        $this->crud->setColumnsDetails('time_ratio',['label'=>'Time']);
        $this->crud->setColumnsDetails('peak_signal',['label'=>'Signal peak']);
        $this->crud->setColumnsDetails('time_signal',['label'=>'Time']);
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);
        
        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);

        // ------ CRUD ACCESS
        $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete','details_row']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        //$this->crud->enableDetailsRow();
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
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }
    public function showDetailsRow($id)
    {
        $summary = $this->crud->getEntry($id);
        return view('vendor.backpack.crud.summary_details_row', compact('summary'));
    }
}
