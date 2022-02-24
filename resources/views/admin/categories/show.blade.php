@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header"><h2>Categories</h2></div>
                    <div class="m-3">

                        <h5>Name</h5>
                        <div class="card-body rounded border border-dark mb-3"> 
                            {{$category->name}}
                        </div>
                        
                        <h5>Slug</h5>
                        <div class="card-body rounded border border-dark mb-3"> 
                            {{$category->slug}}
                        </div>

                        <div> 
                            @if (count($category->posts) > 0)
                                <h5>Lista Posts associati</h5>
                                <div class="card-body rounded border border-dark"> 
                                    <ul>
                                        @foreach ($category->posts as $post)
                                            <li>{{$post->title}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="d-flex">
                            <div class="my-2">
                                <a href="{{route("categories.index")}}"><button type="button" class="btn  updateBtn">Return to Index</button></a>
                            </div>
    
                            <div class="my-2">
                                <a href="{{route("categories.edit", $category->id)}}"><button type="button" class="btn  updateBtn">Update</button></a>
                            </div>
                            <div class="my-2">
                                <form action="{{route("categories.destroy", $category->id)}}" method="POST" >
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn  deleteBtn">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection