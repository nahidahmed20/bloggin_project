@extends('layouts.app')

@section('mainSection')
    @include('layouts.banner')
{{--@include('layouts.tranding')--}}

    <section class="section-sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8  mb-5 mb-lg-0">
                    <h2 class="h5 section-title">Recent Post</h2>

                    @foreach($posts as $post)
                        <article class="card mb-4">
                            <div class="post-slider">
                                <img src="{{asset($post->thumbnail)}}" class="card-img-top" alt="post-thumb">
                            </div>
                            <div class="card-body">
                                <h3 class="mb-3"><a class="post-title" href="post-details.html">{{$post->title}}</a></h3>
                                <ul class="card-meta list-inline">

                                    <li class="list-inline-item">
                                        <i class="ti-calendar"></i>{{$post->post_date}}
                                    </li>
                                    <li class="list-inline-item">
                                        Category : <span class="text-primary">{{$post->category_name}}</span>
                                    </li>
                                </ul>
                                <a href="{{route('single_post_view',$post->id)}}" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </article>
                    @endforeach

                    <ul class="pagination justify-content-center">
                        <li class="page-item page-item active ">
                            <a href="#!" class="page-link">1</a>
                        </li>
                        <li class="page-item">
                            <a href="#!" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#!" class="page-link">&raquo;</a>
                        </li>
                    </ul>
                </div>
                {{--            aside--}}
                @include('layouts.rightbar')
            </div>
        </div>
    </section>

@endsection
