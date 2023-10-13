<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\BlogsDataTable;
use Carbon\Carbon;
use App\Models\Blog;

use App\Http\Controllers\Validations\BlogsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class Blogs extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:blogs_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:blogs_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:blogs_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:blogs_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.32]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(BlogsDataTable $blogs)
            {
               return $blogs->render('admin.blogs.index',['title'=>trans('admin.blogs')]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.blogs.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.32]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(BlogsRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['photo'] = "";
		  		$blogs = Blog::create($data); 
               if(request()->hasFile('photo')){
              $blogs->photo = it()->upload('photo','blogs/'.$blogs->id);
              $blogs->save();
              }

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $blogs,
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
        		$blogs =  Blog::find($id);
        		return is_null($blogs) || empty($blogs)?
        		backWithError(trans("admin.undefinedRecord"),aurl("blogs")) :
        		view('admin.blogs.show',[
				    'title'=>trans('admin.show'),
					'blogs'=>$blogs
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.32]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$blogs =  Blog::find($id);
        		return is_null($blogs) || empty($blogs)?
        		backWithError(trans("admin.undefinedRecord"),aurl("blogs")) :
        		view('admin.blogs.edit',[
				  'title'=>trans('admin.edit'),
				  'blogs'=>$blogs
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
				foreach (array_keys((new BlogsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(BlogsRequest $request,$id)
            {
              // Check Record Exists
              $blogs =  Blog::find($id);
              if(is_null($blogs) || empty($blogs)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("blogs"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('photo')){
              it()->delete($blogs->photo);
              $data['photo'] = it()->upload('photo','blogs');
               } 
              Blog::where('id',$id)->update($data);

              $blogs = Blog::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $blogs,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.32]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$blogs = Blog::find($id);
		if(is_null($blogs) || empty($blogs)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("blogs"));
		}
               		if(!empty($blogs->photo)){
			it()->delete($blogs->photo);		}

		it()->delete('blog',$id);
		$blogs->delete();
		return redirectWithSuccess(aurl("blogs"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$blogs = Blog::find($id);
				if(is_null($blogs) || empty($blogs)){
					return backWithError(trans('admin.undefinedRecord'),aurl("blogs"));
				}
                    					if(!empty($blogs->photo)){
				  it()->delete($blogs->photo);
				}
				it()->delete('blog',$id);
				$blogs->delete();
			}
			return redirectWithSuccess(aurl("blogs"),trans('admin.deleted'));
		}else {
			$blogs = Blog::find($data);
			if(is_null($blogs) || empty($blogs)){
				return backWithError(trans('admin.undefinedRecord'),aurl("blogs"));
			}
                    
			if(!empty($blogs->photo)){
			 it()->delete($blogs->photo);
			}			it()->delete('blog',$data);
			$blogs->delete();
			return redirectWithSuccess(aurl("blogs"),trans('admin.deleted'));
		}
	}
            

}