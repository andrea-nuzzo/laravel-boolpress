@extends('layouts.app')


@section('content')
    <div class="container textColor">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header backgroundLight d-flex align-items-center justify-content-between">
                        <div>Lista dei Posts</div>
                        <i class="fa-regular fa-comment-check"></i>
                        <a href="{{route("posts.create")}}"><button type="button" class="btn createBtn">Create New Post</button></a>
                    </div>
                    <div class="card-body">
                        <div class="row font-weight-bold mb-1">
                            <div class="col-1">#</div>
                            <div class="col-2">Title</div>
                            <div class="col-2">Slug</div>
                            <div class="col-2 text-center">Released</div>
                            <div class="col-2 text-center">Category</div>
                            <div class="col-1 text-center">Show</div>
                            <div class="col-1 text-center">Update</div>
                            <div class="col-1 text-center">Delete</div>
                        </div>
                        @foreach ($posts as $post)

                        <div class="row d-flex align-items-center {{$loop->index % 2 == 0 ? " backgroundLight" : "" }}">
                            <div class="col-1">
                                {{$loop->index + 1}}
                            </div>
                            <div class="col-2 title">
                                {{$post->title}}
                            </div>
                            <div class="col-2 slug">
                                {{$post->slug}}
                            </div>
                            <div class="col-2 text-center">
                                {{$post->published ? "✅" : "❌"}}
                            </div>
                            <div class="col-2 text-center">
                                @if ($post->category)
                                    {{$post->category->name}}
                                @else
                                    Nessuna
                                @endif
                            </div>
                            <div class="col-1 my-1">
                                <a href="{{route("posts.show", $post->id)}}"><button type="button" class="btn plainBtn">Show</button></a>
                            </div>
                            <div class="col-1 my-1">
                                <a href="{{route("posts.edit", $post->id)}}"><button type="button" class="btn  plainBtn">Update</button></a>
                            </div>
                            <div class="col-1 my-1">
                                <form action="{{route("posts.destroy", $post->id)}}" method="POST" >
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn deleteBtn">Delete</button>
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