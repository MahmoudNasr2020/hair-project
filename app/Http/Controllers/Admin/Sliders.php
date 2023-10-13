<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SlidersDataTable;
use Carbon\Carbon;
use App\Models\Slider;

use App\Http\Controllers\Validations\SlidersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class Sliders extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:sliders_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:sliders_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:sliders_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:sliders_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.32]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(SlidersDataTable $sliders)
            {
               return $sliders->render('admin.sliders.index',['title'=>trans('admin.sliders')]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.sliders.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.32]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(SlidersRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['photo'] = "";
		  		$sliders = Slider::create($data); 
               if(request()->hasFile('photo')){
              $sliders->photo = it()->upload('photo','sliders/'.$sliders->id);
              $sliders->save();
              }

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $sliders,
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
        		$sliders =  Slider::find($id);
        		return is_null($sliders) || empty($sliders)?
        		backWithError(trans("admin.undefinedRecord"),aurl("sliders")) :
        		view('admin.sliders.show',[
				    'title'=>trans('admin.show'),
					'sliders'=>$sliders
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$sliders =  Slider::find($id);
        		return is_null($sliders) || empty($sliders)?
        		backWithError(trans("admin.undefinedRecord"),aurl("sliders")) :
        		view('admin.sliders.edit',[
				  'title'=>trans('admin.edit'),
				  'sliders'=>$sliders
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
				foreach (array_keys((new SlidersRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(SlidersRequest $request,$id)
            {
              // Check Record Exists
              $sliders =  Slider::find($id);
              if(is_null($sliders) || empty($sliders)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("sliders"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('photo')){
              it()->delete($sliders->photo);
              $data['photo'] = it()->upload('photo','sliders');
               } 
              Slider::where('id',$id)->update($data);

              $sliders = Slider::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $sliders,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.32]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$sliders = Slider::find($id);
		if(is_null($sliders) || empty($sliders)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("sliders"));
		}
               		if(!empty($sliders->photo)){
			it()->delete($sliders->photo);		}

		it()->delete('slider',$id);
		$sliders->delete();
		return redirectWithSuccess(aurl("sliders"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$sliders = Slider::find($id);
				if(is_null($sliders) || empty($sliders)){
					return backWithError(trans('admin.undefinedRecord'),aurl("sliders"));
				}
                    					if(!empty($sliders->photo)){
				  it()->delete($sliders->photo);
				}
				it()->delete('slider',$id);
				$sliders->delete();
			}
			return redirectWithSuccess(aurl("sliders"),trans('admin.deleted'));
		}else {
			$sliders = Slider::find($data);
			if(is_null($sliders) || empty($sliders)){
				return backWithError(trans('admin.undefinedRecord'),aurl("sliders"));
			}
                    
			if(!empty($sliders->photo)){
			 it()->delete($sliders->photo);
			}			it()->delete('slider',$data);
			$sliders->delete();
			return redirectWithSuccess(aurl("sliders"),trans('admin.deleted'));
		}
	}
            

}