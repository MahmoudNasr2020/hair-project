<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\About_photo;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\About_photosRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.31]
// Copyright Reserved  [it v 1.6.31]
class About_photosApi extends Controller{
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
            	$About_photo = About_photo::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$About_photo]);
            }


            /**
             * Baboon Api Script By [it v 1.6.31]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(About_photosRequest $request)
    {
    	$data = $request->except("_token");
    	
        $About_photo = About_photo::create($data); 

		  $About_photo = About_photo::with($this->arrWith())->find($About_photo->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$About_photo
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
                $About_photo = About_photo::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($About_photo) || empty($About_photo)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $About_photo
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.31]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new About_photosRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(About_photosRequest $request,$id)
            {
            	$About_photo = About_photo::find($id);
            	if(is_null($About_photo) || empty($About_photo)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              About_photo::where("id",$id)->update($data);

              $About_photo = About_photo::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $About_photo
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.31]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $about_photos = About_photo::find($id);
            	if(is_null($about_photos) || empty($about_photos)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("about_photo",$id);

               $about_photos->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $about_photos = About_photo::find($id);
	            	if(is_null($about_photos) || empty($about_photos)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("about_photo",$id);
                    	$about_photos->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $about_photos = About_photo::find($data);
	            	if(is_null($about_photos) || empty($about_photos)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("about_photo",$data);

                    $about_photos->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}