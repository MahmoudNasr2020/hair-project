<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\About_our;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\About_OursRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.31]
// Copyright Reserved  [it v 1.6.31]
class About_OursApi extends Controller{
	protected $selectColumns = [
		"id",
		"title",
		"description",
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
            	$About_our = About_our::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$About_our]);
            }


            /**
             * Baboon Api Script By [it v 1.6.31]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(About_OursRequest $request)
    {
    	$data = $request->except("_token");
    	
        $About_our = About_our::create($data); 

		  $About_our = About_our::with($this->arrWith())->find($About_our->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$About_our
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
                $About_our = About_our::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($About_our) || empty($About_our)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $About_our
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.31]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new About_OursRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(About_OursRequest $request,$id)
            {
            	$About_our = About_our::find($id);
            	if(is_null($About_our) || empty($About_our)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              About_our::where("id",$id)->update($data);

              $About_our = About_our::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $About_our
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.31]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $about_ours = About_our::find($id);
            	if(is_null($about_ours) || empty($about_ours)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("about_our",$id);

               $about_ours->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $about_ours = About_our::find($id);
	            	if(is_null($about_ours) || empty($about_ours)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("about_our",$id);
                    	$about_ours->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $about_ours = About_our::find($data);
	            	if(is_null($about_ours) || empty($about_ours)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("about_our",$data);

                    $about_ours->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}