<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Models\Gempabumi;
use Excel;
use Validator;
use Alert;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StoreGempabumiRequest as StoreRequest;
use App\Http\Requests\UpdateGempabumiRequest as UpdateRequest;

class GempabumiCrudController extends CrudController {

    public function setUp() {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Models\Gempabumi");
        $this->crud->setRoute("admin/pengamatan/gempabumi");
        $this->crud->setEntityNameStrings('Gempabumi', 'Gempabumi');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        $this->crud->setFromDb();
        $fields = [
            [   // DateTime
                'name' => 'tanggal',
                'label' => 'Tanggal',
                'type' => 'date'
            ], [
                'name' => 'waktu',
                'label' => 'Pukul',
                'type' => 'timespinner'
            ], [
                'name' => 'lintang',
                'label' => 'Lintang',
                'type' => 'text'
            ], [
                'name' => 'bujur',
                'label' => 'Bujur',
                'type' => 'text'
            ], [
                'name' => 'magnitudo',
                'label' => 'Magnitudo',
                'type' => 'text'
            ],[
                'name' => 'kedalaman',
                'label' => 'Kedalaman',
                'type' => 'number'
            ], [
                'name' => 'terasa',
                'label' => 'dirasakan',
                'type' => 'checkbox'
            ],
            [
                'name' => 'dirasakan',
                'label' => 'Intensitas',
                'type' =>'text'
            ],
            [
                'name' => 'pga_z',
                'label' => 'PGA Z',
                'type' =>'text',
                'value' => '0.0'
            ],
            [
                'name' => 'pga_ns',
                'label' => 'PGA NS',
                'type' =>'text',
                'value' => '0.0'
            ],
            [
                'name' => 'pga_ew',
                'label' => 'PGA EW',
                'type' =>'text',
                'value' => '0.0'
            ],
            [
                'name' => 'sumber',
                'label' => 'sumber',
                'type' => 'select_from_array',
                'options' => ['seicomp3'=> 'Seiscomp3', 'pgr 5'=>'PGR 5','jamstec' => 'Jamstec']
            ]
        ];

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        $this->crud->addFields($fields, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        //$this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        //$this->crud->removeColumns(['pga_z', 'pga_ns', 'pga_ew', 'id_gempabumi']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        $this->crud->setColumnDetails('tanggal', ['label' => 'Tanggal']);
        $this->crud->setColumnDetails('waktu', ['label' => 'Waktu']);
        $this->crud->setColumnDetails('lintang', ['label' => 'Lintang']);
        $this->crud->setColumnDetails('bujur', ['label' => 'Bujur']);
        $this->crud->setColumnDetails('magnitudo', ['label' => 'Magnitudo']);
        $this->crud->setColumnDetails('kedalaman', ['label' => 'Kedalaman']);
        $this->crud->setColumnDetails('terasa', ['label' => 'Dirasakan']);
        $this->crud->setColumnDetails('dirasakan', ['label' => 'Intensitas']);
        $this->crud->setColumnDetails('sumber', ['label' => 'Sumber']);
        $this->crud->setColumnDetails('pga_z', ['label' => 'Z']);
        $this->crud->setColumnDetails('pga_ns', ['label' => 'NS']);
        $this->crud->setColumnDetails('pga_ew', ['label' => 'EW']);
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
        $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        $this->crud->allowAccess('details_row');
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
        //$this->crud->addButton('top','importgempa', 'importgempa','importgempa');
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
        $gempas = $this->crud->getEntry($id);
        return view('vendor.backpack.crud.gempabumi_details_row', compact('gempas'));
    }

    public function importExcel(Request $request)
    {
        $this->validate($request, ['excel'=> 'required|mimes:xls,xlsx']);
        $excel = $request->file('excel');
        $excels = Excel::selectSheetsByIndex(0)->load($excel, function($reader){})->get();
        $rules = [
            'tanggal' => 'required|unique_with:gempabumis,waktu',
            'waktu' => ['required', 'regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
            'lintang' => 'required|between:-11,11|numeric',
            'bujur'=> 'required|between:130,142.5|numeric',
            'magnitudo' => 'required|numeric|between:1,10',
            'kedalaman' => 'required|integer|between:5,500',
            /*'lokasi' =>'required',
            'pga_z' => 'numeric',
            'pga_ns' => 'numeric',
            'pga_ew' => 'numeric'*/
        ];
        $gempabumis_id = [];
        foreach ($excels as $row) {
            //$validator = Validator::make($row->toArray(), $rules);
            //if ($validator->fails()) continue;//{
               // continue;
                //return back()->withErrors($validator);
           // }*/
            $insert = 
                    [
                    'tanggal' => $row['tanggal'],
                    'waktu' => $row['waktu'],
                    'lintang' => $row['lintang'],
                    'bujur' => $row['bujur'],
                    'magnitudo' => $row['magnitudo'],
                    'kedalaman' => $row['kedalaman'],
                    'lokasi' => $row['lokasi'],
                    'terasa' => $row['terasa'],
                    'dirasakan' => $row['dirasakan'],
                    'pga_z' => $row['pga_z'],
                    'pga_ns' => $row['pga_ns'],
                    'pga_ew' => $row['pga_ew'],
                    'sumber' => $row['sumber']
                    ]
                ;
            Gempabumi::insert($insert);
            array_push($gempabumis_id, $gempabumi->id);
        }
        $gempabumis = Gempabumi::whereIn('id', $gempabumis_id)->get();
        if ($gempabumis->count() == 0) {
            return redirect()->back()->withErrors($validator);
        }
        \Alert::success('Berhasil mengimport data')->flash();
        return redirect('admin/pengamatan/gempabumi');
    }
}
