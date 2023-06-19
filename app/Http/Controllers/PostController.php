<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function createPage(){
        return view('crud.create');
    }

    public function create(Request $request){
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('post#readPage');
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

    public function update($id,Request $request){
        $post = $this->getDataPost($request);
        $Post = $this->postValidationCheck($request);
        Post::where('id',$id)->update($post);
        return redirect()->route('post#readPage')->with(['updateSuccess' => 'Post Updated...']);
    }

      //validation check
    private function postValidationCheck($request){
         $validationRule = [
            "title" => 'required|min:3|unique:posts,title,'.$request->id,
            "description" => "required",
        ];
        Validator::make($request->all(),$validationRule)->validate();
    }

    //request post data
    private function getDataPost($request){
        return[
            'title' => $request->title,
            'description' => $request->description
        ];
    }
}
