<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    //
   public  function index()
   {
       //dd(Gate::allows('admin'));
       //dd(request()->user()->can('admin'));
       //alternatively, amra cannot o use korte pari (notice)
       //$this->authorize('admin');


       return view('posts.index', [
           'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
           //'categories'=>Category::all(),

       ]);
   }

   public function show(Post $post)
   {
       return view('posts.show', [
           'post' => $post
       ]);
   }



   //ei REST collection gula rakhar try korbo always.
    //index, show, create, store, edit, update, destroy


}
