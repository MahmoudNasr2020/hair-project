<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\AboutsDataTable;
use Carbon\Carbon;
use App\Models\About;

use App\Http\Controllers\Validations\AboutsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class Abouts extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:abouts_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:abouts_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:abouts_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:abouts_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

            public function index(AboutsDataTable $abouts)
            {
               return $abouts->render('admin.abouts.index',['title'=>trans('admin.abouts')]);
            }

            public function create()
            {
            	
               return view('admin.abouts.create',['title'=>trans('admin.create')]);
            }


            public function store(AboutsRequest $request)
            {
                /*$data = $request->except("_token", "_method");
            	$data['photo'] = "";
		  		$abouts = About::create($data); 
               if(request()->hasFile('photo')){
              $abouts->photo = it()->upload('photo','abouts/'.$abouts->id);
              $abouts->save();
              }
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('abouts'.$redirect), trans('admin.added'));*/
            }

            public function show($id)
            {
        		$abouts =  About::find($id);
        		return is_null($abouts) || empty($abouts)?
        		backWithError(trans("admin.undefinedRecord"),aurl("abouts")) :
        		view('admin.abouts.show',[
				    'title'=>trans('admin.show'),
					'abouts'=>$abouts
        		]);
            }

            public function edit($id)
            {
        		$abouts =  About::find($id);
        		return is_null($abouts) || empty($abouts)?
        		backWithError(trans("admin.undefinedRecord"),aurl("abouts")) :
        		view('admin.abouts.edit',[
				  'title'=>trans('admin.edit'),
				  'abouts'=>$abouts
        		]);
            }

            public function updateFillableColumns() {
				$fillableCols = [];
				foreach (array_keys((new AboutsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(AboutsRequest $request,$id)
            {
              // Check Record Exists
              $abouts =  About::find($id);
              if(is_null($abouts) || empty($abouts)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("abouts"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('photo')){
              it()->delete($abouts->photo);
              $data['photo'] = it()->upload('photo','abouts');
               } 
              About::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('abouts'.$redirect), trans('admin.updated'));
            }

	public function destroy($id){
		$abouts = About::find($id);
		if(is_null($abouts) || empty($abouts)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("abouts"));
		}
               		if(!empty($abouts->photo)){
			it()->delete($abouts->photo);		}

		it()->delete('about',$id);
		$abouts->delete();
		return redirectWithSuccess(aurl("abouts"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$abouts = About::find($id);
				if(is_null($abouts) || empty($abouts)){
					return backWithError(trans('admin.undefinedRecord'),aurl("abouts"));
				}
                    					if(!empty($abouts->photo)){
				  it()->delete($abouts->photo);
				}
				it()->delete('about',$id);
				$abouts->delete();
			}
			return redirectWithSuccess(aurl("abouts"),trans('admin.deleted'));
		}else {
			$abouts = About::find($data);
			if(is_null($abouts) || empty($abouts)){
				return backWithError(trans('admin.undefinedRecord'),aurl("abouts"));
			}
                    
			if(!empty($abouts->photo)){
			 it()->delete($abouts->photo);
			}			it()->delete('about',$data);
			$abouts->delete();
			return redirectWithSuccess(aurl("abouts"),trans('admin.deleted'));
		}
	}
            

}