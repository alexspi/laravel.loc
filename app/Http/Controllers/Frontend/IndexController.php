<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->desc = 'Задача организации, в особенности же сложившаяся структура организации играет важную роль в формировании 
       существенных финансовых и административных условий. Таким образом укрепление и развитие структуры представляет собой
        интересный эксперимент проверки существенных финансовых и административных условий. С другой стороны консультация с 
        широким активом влечет за собой процесс внедрения и модернизации новых предложений. Задача организации, в особенности 
        же новая модель организационной деятельности позволяет выполнять важные задания по разработке позиций, занимаемых участниками 
        в отношении поставленных задач. С другой стороны рамки и место обучения кадров влечет за собой процесс внедрения и модернизации 
        новых предложений.';

        $this->post = [
            'title' => '',
            'date' => Carbon::today()->subDays(rand(0, 365))->diffForHumans(),
            'comments' => random_int(1, 20),
            'categorys' => ['категория 1', 'категория 2'],
            'image' => '06.jpg',
            'description' => $this->desc
        ];

        $this->posts = [];

        for ($i = 0; $i <= random_int(5, 9); $i++) {
            $this->post['title'] = 'заголовок статьи ' . random_int(1, 5);
            $this->posts[] = $this->post;
        }
    }

    public function index()
    {
        $blog = $this->posts;



        return view('Frontend.index',compact('blog',) );
    }

    public function category($category)
    {
        $blog = $this->posts;

        $category_blog =[];
        foreach ($blog as $post){

            $cat = \Arr::get($post, 'categorys');

            if (in_array($category, $cat)){
                $category_blog[]=$post;
            }

        }

        return view('Frontend.category', compact('category_blog','category'));
    }

    public function single_post($title)
    {
        $blog = $this->posts;


        foreach ($blog as $post){

            if(\Arr::get($post, 'title') == $title){
                return view('Frontend.single_post', compact('post'));
            };



        }


    }
}
