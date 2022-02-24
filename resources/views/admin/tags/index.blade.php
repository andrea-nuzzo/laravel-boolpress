@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>Lista dei Tags</div>
                        <a href="{{route("tags.create")}}"><button type="button" class="btn createBtn border ">Create New Tags</button></a>
                    </div>
                    <div class="card-body">
                        <div class="row font-weight-bold mb-1">
                            <div class="col-2">#</div>
                            <div class="col-2">Name</div>
                            <div class="col-2">Slug</div>
                            <div class="col-2">Show</div>
                            <div class="col-2 ">Update</div>
                            <div class="col-2 ">Delete</div>
                        </div>
                        @foreach ($tags as $tag)

                        <div class="row d-flex align-items-center {{$loop->index % 2 == 0 ? "bgColor" : "" }}">
                            <div class="col-2">
                                {{$loop->index + 1}}
                            </div>
                            <div class="col-2 title">
                                {{$tag->name}}
                            </div>
                            <div class="col-2 slug">
                                {{$tag->slug}}
                            </div>
                            <div class="col-2 my-1">
                                <a href="{{route("tags.show", $tag->id)}}"><button type="button" class="btn showBtn">Show</button></a>
                            </div>
                            <div class="col-2 my-1">
                                <a href="{{route("tags.edit", $tag->id)}}"><button type="button" class="btn  updateBtn">Update</button></a>
                            </div>
                            <div class="col-2 my-1">
                                <form action="{{route("tags.destroy", $tag->id)}}" method="POST" >
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn  deleteBtn">Delete</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection