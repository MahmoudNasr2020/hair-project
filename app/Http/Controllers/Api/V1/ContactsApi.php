<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Contact;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\ContactsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class ContactsApi extends Controller{
	protected $selectColumns = [
		"id",
		"name",
		"email",
		"message",
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
            	$Contact = Contact::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$Contact]);
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(ContactsRequest $request)
    {
    	$data = $request->except("_token");
    	
        $Contact = Contact::create($data); 

		  $Contact = Contact::with($this->arrWith())->find($Contact->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Contact
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
                $Contact = Contact::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Contact) || empty($Contact)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Contact
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.32]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new ContactsRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(ContactsRequest $request,$id)
            {
            	$Contact = Contact::find($id);
            	if(is_null($Contact) || empty($Contact)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              Contact::where("id",$id)->update($data);

              $Contact = Contact::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $Contact
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.32]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $contacts = Contact::find($id);
            	if(is_null($contacts) || empty($contacts)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("contact",$id);

               $contacts->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $contacts = Contact::find($id);
	            	if(is_null($contacts) || empty($contacts)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("contact",$id);
                    	$contacts->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $contacts = Contact::find($data);
	            	if(is_null($contacts) || empty($contacts)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("contact",$data);

                    $contacts->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}