<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Models\Gempabumi;
use App\Models\Lapenda;
use Excel;
use Validator;
use Alert;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;
use Anam\PhantomMagick\Converter;


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
            ],  [
                'name' => 'tsunami',
                'label' => 'Tsunami',
                'type' => 'checkbox'
            ], [
                'name' => 'sumber',
                'label' => 'sumber',
                'type' => 'select_from_array',
                'options' => ['seicomp3'=> 'Seiscomp3', 'pgr 5'=>'PGR 5','jamstec' => 'Jamstec', 'pgn' => 'PGN']
            ]
        ];

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        $this->crud->addFields($fields, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        $this->crud->addColumn('peta'); // add a single column, at the end of the stack
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
        $this->crud->setColumnDetails('tsunami', ['label' => 'Tsunami']);
        $this->crud->setColumnDetails('sumber', ['label' => 'Sumber']);
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);
        
        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        $this->crud->addButtonFromView('line', 'peta' , 'peta', 'end');
        $this->crud->addButtonFromView('line', 'unduhpeta' , 'unduhpeta', 'end'); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);

        // ------ CRUD ACCESS
        $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete', 'peta']);
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
        $tahun = date('Y');
        $this->crud->addClause('where', 'tanggal', 'like', '%'.$tahun.'%');
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
    public function lapenda(Request $request, Builder $builder)
    {
        $html = $builder->columns([
                ['data' => 'no', 'name' => 'no', 'title' => 'Nomor'],
                ['data'=> 'tanggal', 'name' => 'tanggal', 'title' => 'Tanggal'],
                ['data' => 'waktu', 'name' => 'waktu', 'title' => 'Origin'],
                ['data' => 'lintang', 'name' => 'lintang', 'title' => 'Lintang'],
                ['data' => 'bujur', 'name' => 'bujur', 'title' => 'Bujur'],
                ['data' => 'magnitudo', 'name' => 'magnitudo', 'title' => 'Magnitudo'],
                ['data' => 'kedalaman', 'name' => 'kedalaman', 'title' => 'Kedalaman']
            ]);
        return view('gempabumi.lapenda', compact('html'));
    }
    public function getLapenda(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $ini = date('Y');
        $lapendas = Lapenda::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'tanggal',
            'waktu',
            'lintang',
            'bujur',
            'magnitudo',
            'kedalaman',
            'lokasi',
            'dirasakan',
            'tsunami',
            'created_at'])->where('terasa', '=', '1')->where('tanggal', 'like', '%'.$ini.'%');
        $datatables = Datatables::of($lapendas);

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->addColumn('lihat', function ($lapenda) {
                return '<a href="/admin/pengamatan/lapenda/unduh/'.$lapenda->id.'/'.$lapenda->rownum.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> Lihat</a>';
            })
            //->editColumn('id', 'ID: {{$id}}')
            ->addColumn('pdf', function ($lapenda) {
                return '<a href="/admin/pengamatan/lapenda/pdf/'.$lapenda->id.'/'.$lapenda->rownum.'" class="btn btn-xs btn-primary"><i class="fa fa-file-pdf-o"></i> Pdf</a>';
            })
            //->editColumn('id', 'ID: {{$id}}')
            ->make(true)
        ;
    }
    // Lihat infogempa dengan peta GMT
    public function unduh($id, $rownum)
    {   
        $rownum = $rownum;
        $lapenda = Lapenda::find($id);
        $event = Gempabumi::find($id);
        $tahun = date_parse($event['created_at']);
        $bulan = $tahun['month'];
        $month = $bulan;
        $tahun = $tahun['year'];
        //$bulan = '4';
        $file = fopen("/Users/jambari/Desktop/gmt_project/event.gmt","w");
        $tanggal = date_parse($event['tanggal']);
        $waktu = date_parse($event['waktu']);
        $name = $event['id'].$tanggal['year'].$tanggal['month'].$tanggal['day'].$waktu['hour'].$waktu['minute'].$waktu['second'];
        $koordinat = $event['bujur']." ".$event['lintang']." ".$id;
        fwrite($file,$koordinat);
        fclose($file);
        $test = shell_exec('cd /Users/jambari/Desktop/gmt_project && sh ./autoepic.sh');
        return view('gempabumi.unduh')->with(compact('lapenda','tahun','month','rownum'));
    }
    //Lihat Peta infogempa
    public function peta($id)
    {   
        //$rownum = $rownum;
        $lapenda = Lapenda::find($id);
        $event = Gempabumi::find($id);
        $tahun = date_parse($event['created_at']);
        $bulan = $tahun['month'];
        $month = $bulan;
        $hari = $tahun['day'];
        $tahun = $tahun['year'];
        $tahun = str_split($tahun);
        $tahun = $tahun[2].$tahun[3];
        //$bulan = '4';
        $file = fopen("/Users/jambari/Desktop/gmt_project/event.gmt","w");
        $tanggal = date_parse($event['tanggal']);
        $waktu = date_parse($event['waktu']);
        $name = $event['id'].$tanggal['year'].$tanggal['month'].$tanggal['day'].$waktu['hour'].$waktu['minute'].$waktu['second'];
        $koordinat = $event['bujur']." ".$event['lintang']." ".$id;
        fwrite($file,$koordinat);
        fclose($file);
        $test = shell_exec('cd /Users/jambari/Desktop/gmt_project && sh ./autoepic.sh');
        return view('gempabumi.peta')->with(compact('lapenda','tahun','month','hari'));
    }
    // Unduh peta infogempa
    public function unduhpeta($id)
    {   //'office.dev/admin/pengamatan/gempabumi/'.$id.'/peta'
        Converter::make('office.dev/admin/pengamatan/gempabumi/'.$id.'/peta')
        //->setPath('/usr/local/bin/phantomjs')
        ->toPng()
        ->download('infogemppa.png');
    }
    //download lapenda.pdf
    public function pdf($id, $rownum)
    {   //'office.dev/admin/pengamatan/gempabumi/'.$id.'/peta'
        Converter::make('/admin/pengamatan/lapenda/pdf/'.$id.'/'.$rownum)
        //->setPath('/usr/local/bin/phantomjs')
        ->toPdf()
        ->download('lapenda.pdf');
    }
}
