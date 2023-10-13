<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\About;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\AboutsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class AboutsApi extends Controller{
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
            	$About = About::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$About]);
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(AboutsRequest $request)
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
             * Baboon Api Script By [it v 1.6.32]
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
             * Baboon Api Script By [it v 1.6.32]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
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
             * Baboon Api Script By [it v 1.6.32]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $abouts = About::find($id);
            	if(is_null($abouts) || empty($abouts)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($abouts->photo)){
               it()->delete($abouts->photo);
              }
               it()->delete("about",$id);

               $abouts->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $abouts = About::find($id);
	            	if(is_null($abouts) || empty($abouts)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($abouts->photo)){
                    	it()->delete($abouts->photo);
                    	}
                    	it()->delete("about",$id);
                    	$abouts->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $abouts = About::find($data);
	            	if(is_null($abouts) || empty($abouts)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	if(!empty($abouts->photo)){
                    	it()->delete($abouts->photo);
                    	}
                    	it()->delete("about",$data);

                    $abouts->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}