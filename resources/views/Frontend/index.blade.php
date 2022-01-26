@extends('Frontend.layouts.main')

@section('content')
    @include('Frontend.include.slider')

    <!-- layout-fixed -->
    <div class="layout-fixed"> <!-- blog-regular -->
        <div class="blog-regular">
            @foreach($blog as $post)
                <article class="hentry post">

                    <!-- .entry-header -->
                    <header class="entry-header">


                        <!-- .entry-title -->
                        <h1 class="entry-title"><a href="{{route('post', ['title' => $post['title']])}}">{{$post['title']}}</a></h1>

                        <!-- .entry-meta -->
                        <div class="entry-meta">
                                        <span class="entry-date">
                                        	<time class="entry-date">{{$post['date']}}</time>
                                        </span>
                            <span class="comment-link">
                                            <a href="#">{{$post['comments']}} комментариев</a>
                                        </span>

                            <span class="cat-links">
                                @foreach($post['categorys'] as $key=>$val)
                                    <a href="{{route('category', ['category' => $val])}}" title="View all posts in Travel" rel="category tag">{{$val}}</a>
                                @endforeach
                            </span>
                            <!--<span class="edit-link">
                                <a class="post-edit-link" href="#">Edit</a>
                            </span>-->
                        </div>
                        <!-- .entry-meta -->

                    </header>
                    <!-- .entry-header -->

                    <!-- .featured-image -->
                    <div class="featured-image">
                        <a href="{{route('post', ['title' => $post['title']])}}">
                            <img src="{{asset('images/blog/'.$post['image'])}}" alt="blog-image">
                        </a>
                    </div>
                    <!-- .featured-image -->

                    <!-- .entry-content -->
                    <div class="entry-content">
                        <p>{{$post['description']}}</p>
                        <span class="more">
                            <a href="{{route('post', ['title' => $post['title']])}}" class="more-link">Продолжить читать <span class="meta-nav">→</span></a>
                         </span>


                    </div>
                    <!-- .entry-content -->

                </article>

            @endforeach


            <!-- post nav -->
            <nav class="navigation" role="navigation">
                <div class="nav-previous"><a href="#"><span class="meta-nav">←</span>Старые посты</a></div>
                <!--<div class="nav-next"><a href="#">Newer posts <span class="meta-nav">→</span></a></div>-->
            </nav>
            <!-- post nav -->


        </div>
        <!-- blog-regular -->


    </div>
    <!-- layout-fixed -->
@endsection