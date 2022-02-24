@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>Lista dei Posts</div>
                        <a href="{{route("posts.create")}}"><button type="button" class="btn createBtn border ">Create New Post</button></a>
                    </div>
                    <div class="card-body">
                        <div class="row font-weight-bold mb-1">
                            <div class="col-1">#</div>
                            <div class="col-3">Title</div>
                            <div class="col-3">Slug</div>
                            <div class="col-1 text-center">Released</div>
                            <div class="col-1 text-center">Category</div>
                            <div class="col-1 text-center">Show</div>
                            <div class="col-1 text-center">Update</div>
                            <div class="col-1 text-center">Delete</div>
                        </div>
                        @foreach ($posts as $post)

                        <div class="row d-flex align-items-center {{$loop->index % 2 == 0 ? "bgColor" : "" }}">
                            <div class="col-1">
                                {{$loop->index + 1}}
                            </div>
                            <div class="col-3 title">
                                {{$post->title}}
                            </div>
                            <div class="col-3 slug">
                                {{$post->slug}}
                            </div>
                            <div class="col-1 text-center">
                                {{$post->published ? "✅" : "❌"}}
                            </div>
                            <div class="col-1 text-center">
                                {{-- @if ($category->name)
                                    {{$category->name}}
                                @else
                                    Nessuna
                                @endif --}}
                                    Nessuna
                            </div>
                            <div class="col-1 my-1">
                                <a href="{{route("posts.show", $post->id)}}"><button type="button" class="btn showBtn">Show</button></a>
                            </div>
                            <div class="col-1 my-1">
                                <a href="{{route("posts.edit", $post->id)}}"><button type="button" class="btn  updateBtn">Update</button></a>
                            </div>
                            <div class="col-1 my-1">
                                <form action="{{route("posts.destroy", $post->id)}}" method="POST" >
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