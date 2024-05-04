@extends('layouts.app')

@section('mainSection')

    <div class="py-4"></div>
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-lg-9   mb-5 mb-lg-0">
                    <article>
                        <div class="post-slider mb-4">
                            <img src="{{asset($post->thumbnail)}}" class="card-img" alt="post-thumb">
                        </div>

                        <h1 class="h2">{{$post->title}}</h1>
                        <ul class="card-meta my-3 list-inline">
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>{{$post->post_date}}
                            </li>
                            <li class="list-inline-item">
                                Category : <span class="text-primary">{{$post->category_name}}</span>
                            </li>

                        </ul>
                        <div class="content">
                            <p>{!! $post->description !!}</p>
                        </div>
                    </article>

                </div>

                <div class="col-lg-9 col-md-12">
                    <div class="mb-5 border-top mt-4 pt-5">
                        <h3 class="mb-4">Comments</h3>

                        @foreach($comments as $comment)
                            <div class="media d-block d-sm-flex mb-4 pb-4">
                                <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                                    <img src="images/post/user-01.jpg" class="mr-3 rounded-circle" alt="">
                                </a>
                                <div class="media-body">
                                    <a href="#!" class="h4 d-inline-block mb-3">{{$comment->users_name}}</a>

                                    <p>{!! $comment->comment !!}</p>

                                    <span class="text-black-800 mr-3 font-weight-600">{{$comment->created_at}}</span>

                                </div>


                                    <div class="d-flex">
                                        <button class="btn btn-primary mr-2"  data-toggle="modal" data-target="{{'#edit'.$comment->id.'post'}}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{route('comment_delete',$comment->id)}}" >
                                            @csrf
                                            <button type="submit" class="btn btn-danger delete"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>

                            </div>

                            <!-- Comment Edit Modal-->
                            <div class="modal " id="{{'edit'.$comment->id.'post'}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">

                                        <form action="{{route('comment_update',$comment->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label >Post Comment</label>
                                                    <textarea  name="comment" class="summernote form-control @error('comment') is-invalid @enderror" rows="5" >{{$comment->comment}}</textarea>
                                                    @error('comment')
                                                    <p class="invalid-feedback">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                                                <button type="submit" class="btn btn-primary" href="login.html">Add Post</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{$comments->links('pagination::bootstrap-5')}}

                    </div>

                    <div>
                        <h3 class="mb-4">Leave a Reply</h3>
                        <form action="{{route('comment_store',$post->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group ">
                                    <textarea class="summernote form-control shadow-none" name="comment" rows="5" required></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Comment Now</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>



@endsection
