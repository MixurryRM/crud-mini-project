<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function createPage(){
        return view('crud.create');
    }

    public function create(Request $request){

        // dd($request->all())
        $this->postValidationCheck($request,"create");
        $data = $this->requestDataPost($request);

        $fileName = uniqid().$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public',$fileName);
        $data['image'] = $fileName;
        Post::create($data);

        return redirect()->route('post#readPage')->with(['updateSuccess' => 'Post Updated Successful']);
    }

    public function readPage(){
        $post = Post::orderBy('id','desc')->paginate(3);
        return view('crud.read',compact('post'));
    }

    public function delete($id){
        Post::where('id',$id)->delete();
        return back()->with(['deleteSuccess' => 'Post Deleting Successful...']);
    }

    public function editPage($id){
        $post = Post::where('id',$id)->first();
        return view('crud.edit',compact('post'));
    }

    public function update(Request $request){

        $data = $this->requestDataPost($request);
        $this->postValidationCheck($request,"update");

        if($request->hasFile('image')){
            $oldImageName = Post::where('id',$request->id)->first();
            $oldImageName = $oldImageName->image;

            Storage::delete('public/'.$oldImageName);


            $fileName = uniqid().$request->file('image')->getClientOriginalName();

            $request->file('image')->storeAs('public/'.$fileName);
            $data['image'] = $fileName;
        }
        // dd($data);
        Post::where('id',$request->id)->update($data);
        return redirect()->route('post#readPage')->with(['updateSuccess' => 'Post Updated...']);
    }

      //validation check
    private function postValidationCheck($request,$status){
         $validationRule = [
            "title" => 'required|min:3|unique:posts,title,'.$request->id,
            "description" => "required",
        ];

        $validationRule['image'] = $status == 'create' ? 'required|mimes:jpg,jpeg,png,webp|file' : "mimes:jpg,jpeg,png,webp|file";

        Validator::make($request->all(),$validationRule)->validate();
    }

    //request post data
    private function requestDataPost($request){
        return[
            'title' => $request->title,
            'description' => $request->description
        ];
    }
}
