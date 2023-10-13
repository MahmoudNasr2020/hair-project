<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Service;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\ServicesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class ServicesApi extends Controller{
	protected $selectColumns = [
		"id",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.32]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return [];
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Service = Service::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$Service]);
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(ServicesRequest $request)
    {
    	$data = $request->except("_token");
    	
        $Service = Service::create($data); 

		  $Service = Service::with($this->arrWith())->find($Service->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Service
        ]);
    }


            /**
             * Display the specified resource.
             * Baboon Api Script By [it v 1.6.32]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $Service = Service::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Service) || empty($Service)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Service
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new ServicesRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(ServicesRequest $request,$id)
            {
            	$Service = Service::find($id);
            	if(is_null($Service) || empty($Service)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              Service::where("id",$id)->update($data);

              $Service = Service::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $Service
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.32]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $services = Service::find($id);
            	if(is_null($services) || empty($services)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($services->photo)){
               it()->delete($services->photo);
              }
               it()->delete("service",$id);

               $services->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $services = Service::find($id);
	            	if(is_null($services) || empty($services)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($services->photo)){
                    	it()->delete($services->photo);
                    	}
                    	it()->delete("service",$id);
                    	$services->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $services = Service::find($data);
	            	if(is_null($services) || empty($services)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	if(!empty($services->photo)){
                    	it()->delete($services->photo);
                    	}
                    	it()->delete("service",$data);

                    $services->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}