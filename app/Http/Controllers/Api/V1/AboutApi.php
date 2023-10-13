<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\About;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\AboutRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.31]
// Copyright Reserved  [it v 1.6.31]
class AboutApi extends Controller{
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
            	$About = About::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$About]);
            }


            /**
             * Baboon Api Script By [it v 1.6.31]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(AboutRequest $request)
    {
    	$data = $request->except("_token");
    	
        $About = About::create($data); 

		  $About = About::with($this->arrWith())->find($About->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$About
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
                $About = About::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($About) || empty($About)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $About
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.31]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new AboutRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(AboutRequest $request,$id)
            {
            	$About = About::find($id);
            	if(is_null($About) || empty($About)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              About::where("id",$id)->update($data);

              $About = About::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $About
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.31]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $about = About::find($id);
            	if(is_null($about) || empty($about)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("about",$id);

               $about->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $about = About::find($id);
	            	if(is_null($about) || empty($about)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("about",$id);
                    	$about->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $about = About::find($data);
	            	if(is_null($about) || empty($about)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("about",$data);

                    $about->delete();
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
				$rules["photos"] = "required|image|array";
			}


			$this->validate(request(), $rules, [], [
				 "photos" => trans("admin.photos"),

			]);

			if(request()->hasFile("photos")){
				it()->upload("photos", request("dz_path"), "about", request("dz_id"));
			}

			return successResponseJson([
				"type" => request("dz_type"),
				"file" => it()->getFile("about", request("dz_id")),
			]);
	}
}