@extends('admin.layouts.app')

@section('title')
    Post
@endsection

@php
    $page = 'Post';
@endphp

@section('main_part')
    <div class="card ">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h4 class="card-title">All Post</h4>
            <button class="btn btn-primary" data-toggle="modal" data-target="#postAdd">Add Post</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" >
                <thead class="mx-auto">
                <tr>
                    <th >SL NO</th>
                    <th >Title</th>
                    <th >Description</th>
                    <th >Category</th>
                    <th >Thumbnail</th>
                    <th >Status</th>
                    <th >Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td >{{$loop->iteration}}</td>
                        <td>{{$post->title}}</td>
                        <td>{!! $post->description !!}</td>
                        <td>{{$post->category_name}}</td>
                        <td><img src="{{asset($post->thumbnail)}}" height="50" width="40" ></td>
                        <td>
                            @if($post->status == 1)
                                <span class="badge badge-success">Public</span>
                            @else
                                <span class="badge badge-danger">Private</span>
                            @endif
                        </td>
                        <td >
                            <div class="d-flex">
                                <button class="btn btn-primary mr-2"  data-toggle="modal" data-target="{{'#edit'.$post->id.'post'}}"><i class="fas fa-edit"></i></button>
                                <form action="{{route('post.destroy',$post->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger delete"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Post Edit Modal-->
                    <div class="modal " id="{{'edit'.$post->id.'post'}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$post->title}}</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label >Post Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{$post->title}}" name="title" >
                                            @error('title')
                                            <p class="invalid-feedback">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label >Post Category</label>
                                            <select name="category_id" class="form-control">

                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"
                                                    @if($category->id == $post->category_id) selected @endif>
                                                        {{$category->title}}</option>

                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label >Post Description</label>
                                            <textarea  name="description" class="summernote form-control @error('description') is-invalid @enderror" rows="5" >{{$post->description}}</textarea>
                                            @error('description')
                                            <p class="invalid-feedback">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label >Post Thumbnail</label>
                                            <input type="file" class="form-control-file "  name="thumbnail" >
                                        </div>

                                        <label for="status" class="form-check-label">
                                            <input type="checkbox" value="1" name="status" id="status"
                                            @if($post->status == 1) checked @endif > Status
                                        </label>
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

                </tbody>
            </table>

        </div>
    </div>

    <!-- Post Add Modal-->
    <div class="modal " id="postAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label >Post Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" name="title" >
                            @error('title')
                            <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label >Post Category</label>
                            <select name="category_id" class="form-control">
                                <option selected disabled>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label >Post Description</label>
                            <textarea  name="description" class=" summernote form-control @error('description') is-invalid @enderror" rows="5" >{{old('description')}}</textarea>
                            @error('description')
                            <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label >Post Thumbnail</label>
                            <input type="file" class="form-control-file "  name="thumbnail" >
                        </div>

                        <label for="status" class="form-check-label">
                            <input type="checkbox" value="1" name="status" id="status"> Status
                        </label>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary" href="login.html">Add Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

