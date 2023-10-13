<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Soft;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\SoftsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.31]
// Copyright Reserved  [it v 1.6.31]
class SoftsApi extends Controller{
	protected $selectColumns = [
		"id",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.31]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return [];
            }


            /**
             * Baboon Api Script By [it v 1.6.31]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Soft = Soft::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$Soft]);
            }


            /**
             * Baboon Api Script By [it v 1.6.31]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(SoftsRequest $request)
    {
    	$data = $request->except("_token");
    	
        $Soft = Soft::create($data); 

		  $Soft = Soft::with($this->arrWith())->find($Soft->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Soft
        ]);
    }


            /**
             * Display the specified resource.
             * Baboon Api Script By [it v 1.6.31]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $Soft = Soft::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Soft) || empty($Soft)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Soft
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.31]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new SoftsRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(SoftsRequest $request,$id)
            {
            	$Soft = Soft::find($id);
            	if(is_null($Soft) || empty($Soft)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              Soft::where("id",$id)->update($data);

              $Soft = Soft::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $Soft
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.31]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $softs = Soft::find($id);
            	if(is_null($softs) || empty($softs)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("soft",$id);

               $softs->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $softs = Soft::find($id);
	            	if(is_null($softs) || empty($softs)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("soft",$id);
                    	$softs->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $softs = Soft::find($data);
	            	if(is_null($softs) || empty($softs)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("soft",$data);

                    $softs->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
	// Delete Files From Dropzone Library
	public function delete_file() {
		if (request("type_file") && request("type_id")) {
			if (it()->getFile(request("type_file"), request("type_id"))) {
				it()->delete(null, null, request("id"));
				return successResponseJson([]);
			}
		}
	}

	// Multi upload with dropzone
	public function multi_upload() {
			$rules = [];
			if(request()->hasFile("Photos")){
				$rules["Photos"] = "image";
			}


			$this->validate(request(), $rules, [], [
				 "Photos" => trans("admin.Photos"),

			]);

			if(request()->hasFile("Photos")){
				it()->upload("Photos", request("dz_path"), "softs", request("dz_id"));
			}

			return successResponseJson([
				"type" => request("dz_type"),
				"file" => it()->getFile("softs", request("dz_id")),
			]);
	}
}