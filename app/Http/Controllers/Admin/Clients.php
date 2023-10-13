<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ClientsDataTable;
use Carbon\Carbon;
use App\Models\Client;

use App\Http\Controllers\Validations\ClientsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class Clients extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:clients_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:clients_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:clients_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:clients_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.32]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ClientsDataTable $clients)
            {
               return $clients->render('admin.clients.index',['title'=>trans('admin.clients')]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.clients.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.32]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(ClientsRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['photo'] = "";
		  		$clients = Client::create($data); 
               if(request()->hasFile('photo')){
              $clients->photo = it()->upload('photo','clients/'.$clients->id);
              $clients->save();
              }

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $clients,
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
        		$clients =  Client::find($id);
        		return is_null($clients) || empty($clients)?
        		backWithError(trans("admin.undefinedRecord"),aurl("clients")) :
        		view('admin.clients.show',[
				    'title'=>trans('admin.show'),
					'clients'=>$clients
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$clients =  Client::find($id);
        		return is_null($clients) || empty($clients)?
        		backWithError(trans("admin.undefinedRecord"),aurl("clients")) :
        		view('admin.clients.edit',[
				  'title'=>trans('admin.edit'),
				  'clients'=>$clients
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
				foreach (array_keys((new ClientsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(ClientsRequest $request,$id)
            {
              // Check Record Exists
              $clients =  Client::find($id);
              if(is_null($clients) || empty($clients)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("clients"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('photo')){
              it()->delete($clients->photo);
              $data['photo'] = it()->upload('photo','clients');
               } 
              Client::where('id',$id)->update($data);

              $clients = Client::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $clients,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.32]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$clients = Client::find($id);
		if(is_null($clients) || empty($clients)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("clients"));
		}
               		if(!empty($clients->photo)){
			it()->delete($clients->photo);		}

		it()->delete('client',$id);
		$clients->delete();
		return redirectWithSuccess(aurl("clients"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$clients = Client::find($id);
				if(is_null($clients) || empty($clients)){
					return backWithError(trans('admin.undefinedRecord'),aurl("clients"));
				}
                    					if(!empty($clients->photo)){
				  it()->delete($clients->photo);
				}
				it()->delete('client',$id);
				$clients->delete();
			}
			return redirectWithSuccess(aurl("clients"),trans('admin.deleted'));
		}else {
			$clients = Client::find($data);
			if(is_null($clients) || empty($clients)){
				return backWithError(trans('admin.undefinedRecord'),aurl("clients"));
			}
                    
			if(!empty($clients->photo)){
			 it()->delete($clients->photo);
			}			it()->delete('client',$data);
			$clients->delete();
			return redirectWithSuccess(aurl("clients"),trans('admin.deleted'));
		}
	}
            

}