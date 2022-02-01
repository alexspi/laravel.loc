@extends('Frontend.layouts.main')

@section('content')


    <!-- layout-fixed -->
    <div class="layout-fixed">
        <article class="hentry post">


            <!-- .entry-header -->
            <header class="entry-header">


                <!-- .entry-title -->
                <h1 class="entry-title">{{$post->title}}</h1>


                <!-- .entry-meta -->
                <div class="entry-meta">
                     <span class="entry-date">
                         <time class="entry-date">{{$post->created_at->toDayDateTimeString()}}}</time>
                     </span>
                    <span class="comment-link">
                                            <a href="#">{{count($post->comments)}} Comments</a>
                                        </span>
                    <span class="read-time"><span class="eta"></span> read</span>
                    <span class="cat-links">

                            <a href="{{route('category', ['slug' =>  $post->category->slug])}}" title="View all posts in Travel" rel="category tag">{{ $post->category->name }}</a>


                    </span>

                </div>
                <!-- .entry-meta -->

            </header>
            <!-- .entry-header -->

            <!-- .featured-image -->
{{--            <div class="featured-image">--}}
{{--                <img src="{{asset('/images/blog/'.$post['image'])}}" alt="blog-image">--}}
{{--            </div>--}}
            <!-- .featured-image -->


            <!-- .entry-content -->
            <div class="entry-content">

                <p>{{$post->body}}</p>

                <!-- .post-tags -->
                <div class="post-tags tagcloud">
                    Теги:
                    @forelse ($post->tags as $tag)
                        <span class="label label-default">{{ $tag->name }}</span>
                    @empty
                        <span class="label label-danger">No tag found.</span>
                    @endforelse

                </div>
                <!-- .post-tags -->

                <!-- .nav-single -->
                <nav class="nav-single row">

                    <div class="nav-previous col-sm-6">
                        <h4>PREVIOUS POST</h4>
                        <a href="#" rel="prev"><span class="meta-nav">←</span> There's always light at the end of the tunnel</a>
                    </div>

                    <div class="nav-next col-sm-6">
                        <h4>NEXT POST</h4>
                        <a href="#" rel="next">Becoming A DragonFly <span class="meta-nav">→</span></a>
                    </div>

                </nav>
                <!-- .nav-single -->


                <!-- .about-author -->

                <!-- realated-posts -->


            </div>
            <!-- .entry-content -->


        </article>
        <!-- blog-regular -->


    </div>
    <!-- layout-fixed -->
@endsection