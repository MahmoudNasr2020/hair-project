<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ME;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\MesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.31]
// Copyright Reserved  [it v 1.6.31]
class MesApi extends Controller{
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
            	$ME = ME::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$ME]);
            }


            /**
             * Baboon Api Script By [it v 1.6.31]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(MesRequest $request)
    {
    	$data = $request->except("_token");
    	
        $ME = ME::create($data); 

		  $ME = ME::with($this->arrWith())->find($ME->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$ME
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
                $ME = ME::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($ME) || empty($ME)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $ME
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.31]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new MesRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(MesRequest $request,$id)
            {
            	$ME = ME::find($id);
            	if(is_null($ME) || empty($ME)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              ME::where("id",$id)->update($data);

              $ME = ME::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $ME
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.31]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $mes = ME::find($id);
            	if(is_null($mes) || empty($mes)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("me",$id);

               $mes->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $mes = ME::find($id);
	            	if(is_null($mes) || empty($mes)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("me",$id);
                    	$mes->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $mes = ME::find($data);
	            	if(is_null($mes) || empty($mes)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("me",$data);

                    $mes->delete();
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
			if(request()->hasFile("photos")){
				$rules["photos"] = "required|image";
			}


			$this->validate(request(), $rules, [], [
				 "photos" => trans("admin.photos"),

			]);

			if(request()->hasFile("photos")){
				it()->upload("photos", request("dz_path"), "mes", request("dz_id"));
			}

			return successResponseJson([
				"type" => request("dz_type"),
				"file" => it()->getFile("mes", request("dz_id")),
			]);
	}
}