<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Blog;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\BlogsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class BlogsApi extends Controller{
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
            	$Blog = Blog::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$Blog]);
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(BlogsRequest $request)
    {
    	$data = $request->except("_token");
    	
        $Blog = Blog::create($data); 

		  $Blog = Blog::with($this->arrWith())->find($Blog->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Blog
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
                $Blog = Blog::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Blog) || empty($Blog)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Blog
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new BlogsRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(BlogsRequest $request,$id)
            {
            	$Blog = Blog::find($id);
            	if(is_null($Blog) || empty($Blog)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              Blog::where("id",$id)->update($data);

              $Blog = Blog::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $Blog
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.32]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $blogs = Blog::find($id);
            	if(is_null($blogs) || empty($blogs)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($blogs->photo)){
               it()->delete($blogs->photo);
              }
               it()->delete("blog",$id);

               $blogs->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $blogs = Blog::find($id);
	            	if(is_null($blogs) || empty($blogs)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($blogs->photo)){
                    	it()->delete($blogs->photo);
                    	}
                    	it()->delete("blog",$id);
                    	$blogs->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $blogs = Blog::find($data);
	            	if(is_null($blogs) || empty($blogs)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	if(!empty($blogs->photo)){
                    	it()->delete($blogs->photo);
                    	}
                    	it()->delete("blog",$data);

                    $blogs->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}