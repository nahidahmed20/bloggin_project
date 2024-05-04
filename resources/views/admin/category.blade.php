@extends('admin.layouts.app')

@section('title')
    Categories
@endsection

@php
    $page = 'Categories';
@endphp

@section('main_part')
    <div class="card ">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h4 class="card-title">All Categories</h4>
            <button class="btn btn-primary" data-toggle="modal" data-target="#categoryAdd">Add Category</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" >
                <thead class="mx-auto">
                <tr>
                    <th >SL NO</th>
                    <th >Title</th>
                    <th >Content</th>
                    <th >Author</th>
                    <th >Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($categories as $category)
                <tr>
                    <td >{{$loop->iteration}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->author}}</td>
                    <td >
                        <div class="d-flex">
                            <button class="btn btn-primary mr-2"  data-toggle="modal" data-target="{{'#edit'.$category->id.'category'}}"><i class="fas fa-edit"></i></button>
                            <form action="{{route('category.destroy',$category->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger delete"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- Category Edit Modal-->
                <div class="modal fade" id="{{'edit'.$category->id.'category'}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$category->title}}</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="{{route('category.update',$category->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label >Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{$category->title}}" name="title" >
                                        @error('title')
                                        <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label >Content</label>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" >{{$category->description}}</textarea>
                                        @error('description')
                                        <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label >Author</label>
                                        <input type="text" class="form-control @error('author') is-invalid @enderror" value="{{$category->author}}" name="author" >
                                        @error('author')
                                        <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                                    <button type="submit" class="btn btn-primary" href="login.html">Add Category</button>
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

    <!-- Category Add Modal-->
    <div class="modal fade" id="categoryAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('category.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label >Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" name="title" >
                            @error('title')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Content</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" >{{old('description')}}</textarea>
                            @error('description')
                            <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Author</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" value="{{old('author')}}" name="author" >
                            @error('author')
                            <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary" href="login.html">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
