@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header"><h2>Tag</h2></div>
                    <div class="m-3">

                        <h5>Name</h5>
                        <div class="card-body rounded border border-dark mb-3"> 
                            {{$tag->name}}
                        </div>
                        
                        <h5>Slug</h5>
                        <div class="card-body rounded border border-dark"> 
                            {{$tag->slug}}
                        </div>
                        <div class="d-flex">
                            <div class="my-2">
                                <a href="{{route("tags.index")}}"><button type="button" class="btn  updateBtn">Return to Index</button></a>
                            </div>
    
                            <div class="my-2">
                                <a href="{{route("tags.edit", $tag->id)}}"><button type="button" class="btn  updateBtn">Update</button></a>
                            </div>
                            <div class="my-2">
                                <form action="{{route("tags.destroy", $tag->id)}}" method="POST" >
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