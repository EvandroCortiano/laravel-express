<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Tag;

class PostAdminController extends Controller
{
	public function __construct(Post $post){
		
		$this->post = $post;
		
	}
	
    public function index(){
    	
    	$posts = $this->post->paginate(10);
    	
		return view('admin.posts.index', compact('posts'));
	}
	
	public function create(){
		
		return view('admin.posts.create');
		
	}
	
	public function store(PostRequest $request){
		//imprime o array na tela = print_r
		//dd($tagsIDs);
		
		$post = $this->post->create($request->all());
		$post->tags()->sync($this->getTagsIds($request->tags));
		 
		return redirect()->route('admin.posts.index');
	}
	
	public function edit($id){
		
		$post = $this->post->find($id);
		
		return view('admin.posts.edit', compact('post'));
	}
	
	public function update($id, PostRequest $request){
			
		$this->post->find($id)->update($request->all());
		$post = $this->post->find($id);
		$post->tags()->sync($this->getTagsIds($request->tags));
		
		return redirect()->route('admin.posts.index');
	}
	
	public function destroy($id){
		
		$this->post->find($id)->delete();
		
		return redirect()->route('admin.posts.index');
	}
	
	private function getTagsIds($tags){
		$tagList = array_filter(array_map('trim', explode(',', $tags)));
		$tagsIDs = [];
		
		foreach ($tagList as $tagName){
			$tagsIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
		}
		
		return $tagsIDs;
	}
}
