<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\StatisticsDataTable;
use Carbon\Carbon;
use App\Models\Statistic;

use App\Http\Controllers\Validations\StatisticsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class Statistics extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:statistics_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:statistics_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:statistics_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:statistics_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.32]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(StatisticsDataTable $statistics)
            {
               return $statistics->render('admin.statistics.index',['title'=>trans('admin.statistics')]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.statistics.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.32]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(StatisticsRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$statistics = Statistic::create($data); 

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $statistics,
			]);
			 }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.32]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$statistics =  Statistic::find($id);
        		return is_null($statistics) || empty($statistics)?
        		backWithError(trans("admin.undefinedRecord"),aurl("statistics")) :
        		view('admin.statistics.show',[
				    'title'=>trans('admin.show'),
					'statistics'=>$statistics
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$statistics =  Statistic::find($id);
        		return is_null($statistics) || empty($statistics)?
        		backWithError(trans("admin.undefinedRecord"),aurl("statistics")) :
        		view('admin.statistics.edit',[
				  'title'=>trans('admin.edit'),
				  'statistics'=>$statistics
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				$fillableCols = [];
				foreach (array_keys((new StatisticsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(StatisticsRequest $request,$id)
            {
              // Check Record Exists
              $statistics =  Statistic::find($id);
              if(is_null($statistics) || empty($statistics)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("statistics"));
              }
              $data = $this->updateFillableColumns(); 
              Statistic::where('id',$id)->update($data);

              $statistics = Statistic::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $statistics,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.32]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$statistics = Statistic::find($id);
		if(is_null($statistics) || empty($statistics)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("statistics"));
		}
               
		it()->delete('statistic',$id);
		$statistics->delete();
		return redirectWithSuccess(aurl("statistics"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$statistics = Statistic::find($id);
				if(is_null($statistics) || empty($statistics)){
					return backWithError(trans('admin.undefinedRecord'),aurl("statistics"));
				}
                    	
				it()->delete('statistic',$id);
				$statistics->delete();
			}
			return redirectWithSuccess(aurl("statistics"),trans('admin.deleted'));
		}else {
			$statistics = Statistic::find($data);
			if(is_null($statistics) || empty($statistics)){
				return backWithError(trans('admin.undefinedRecord'),aurl("statistics"));
			}
                    
			it()->delete('statistic',$data);
			$statistics->delete();
			return redirectWithSuccess(aurl("statistics"),trans('admin.deleted'));
		}
	}
            

}