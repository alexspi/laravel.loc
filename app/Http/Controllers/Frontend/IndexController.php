<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
   

    public function index()
    {
        $blog = Post::paginate(5);

        return view('Frontend.index',compact('blog',) );
    }

    public function category($slug)
    {
       $category = Category::whereSlug($slug)->first();

        $blog = Post::where('category_id',$category->id)->paginate(5);

        return view('Frontend.category', compact('blog','category'));
    }

    public function single_post($slug)
    {
        $post= Post::whereSlug($slug)->first();


            return view('Frontend.single_post', compact('post'));



    }
}
