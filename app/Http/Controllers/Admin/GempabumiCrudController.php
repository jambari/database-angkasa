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
        $this->crud->setRoute("admin/gempabumi");
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
                'type' => 'date',
            ], [
                'name' => 'waktu',
                'label' => 'Pukul',
                'type' => 'text',
                'value' => '00:00:00'
            ], [
                'name' => 'lintang',
                'label' => 'Lintang',
                'type' => 'text',
                'value' => '-2.00'
            ], [
                'name' => 'bujur',
                'label' => 'Bujur',
                'type' => 'text',
                'value' => '134.00'
            ], [
                'name' => 'magnitudo',
                'label' => 'Magnitudo',
                'type' => 'text',
                'value' => '0.0'
            ],[
                'name' => 'kedalaman',
                'label' => 'Kedalaman',
                'type' => 'number',
                'value' => '10'
            ], [
                'name' => 'terasa',
                'label' => 'dirasakan',
                'type' => 'checkbox'
            ],
            [
                'name' => 'dirasakan',
                'label' => 'Intensitas',
                'type' =>'text',
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
            ], [
                'name' => 'sumber',
                'label' => 'sumber',
                'type' => 'select_from_array',
                'options' => ['jamstec' => 'Jamstec', 'seicomp3'=> 'Seiscomp3', 'pgr 5'=>'PGR 5']
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
        $this->crud->removeColumns(['pga_z', 'pga_ns', 'pga_ew']); // remove an array of columns from the stack
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
        $this->validate($request, [ 'excel' => 'required|mimes:xls,xlsx']); 
        if($request->hasFile('excel')){
        $path = $request->file('excel')->getRealPath();

        $rowRules = [
            'tanggal' => 'required',
            'waktu' => 'required',
            'lintang' => 'required|min:4|max:5',
            'bujur'=> 'required|min:3|max:6',
            'magnitudo' => 'required|min:1|max:3',
            'kedalaman' => 'required|min:2|max:3',
            'lokasi' =>'required'
        ];

        $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){
                foreach ($data->toArray() as $key => $rows) {
                    //$validator = Validator::make($rows->toArray(), $rowRules);
                    //if ($validator->fails()) continue ;
                    if(!empty($rows)){
                        foreach ($rows as $row) {        
                            $insert[] = [
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
                            ];

                        }
                    }
                }
                if(!empty($insert)){
                        Gempabumi::insert($insert);
                        \Alert::success('Data berhasil ditambahkan')->flash();
                    return redirect('admin/gempabumi');
                }
            }
        }
        \Alert::error('Ada yang salah dengan data anda, tolong perbaiki')->flash();
        return back();
    }
}
