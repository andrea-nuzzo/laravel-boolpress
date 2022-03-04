@extends('layouts.app')


@section('content')
    <div class="container textColor">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    
                    <div class="card-header backgroundLight"><h2>{{$post->title}}</h2></div>
                    <div class="m-3">

                         {{-- Image --}}
                        @if ($post->image)
                            <div class="d-flex justify-content-center">
                                <img  width="600"src="{{asset("storage/{$post->image}")}}" alt="{{$post->title}}" class="rounded">
                            </div>
                        @endif

                        {{-- Post Content --}}
                        <h5>Content</h5>
                        <div class="card-body rounded border border-dark"> 
                            {{$post->content}}
                        </div>

                        {{-- Categories --}}
                        <h5 class="mt-3">Category</h5>
                        <div class="card-body  raudend border bgColor">
                            <div class="">
                                @if ($post->category)
                                    <span class="showCategory p-2 rounded">{{$post->category->name}}</span>
                                @else
                                    Nessuna Categoria
                                @endif                               
                            </div>
                        </div>
                        
                        {{-- Section Tags --}}
                        <h5 class="mt-3">Tags</h5>
                        <div class="card-body  raudend border bgColor">
                            <div class="">
                                @if (count($post->tags) > 0)
                                @foreach ($post->tags as $tags)
                                    <span class="showCategory p-2 rounded">{{$tags->name}}</span>
                                @endforeach
                                @else
                                    Nessun Tags
                                @endif                               
                            </div>
                        </div>
                        
                        {{-- Section Button Posted Draft --}}
                        <div class="mx-2 my-3">
                            <div class="d-flex">
                                @if($post->published)
                                <div class="rounded-left p-2 postedBtn">Posted</div>
                                <div class="rounded-right p-2 bg-light">Draft</div>
                                @else
                                <div class="rounded-left p-2 bg-light">Posted</div>
                                <div class="rounded-right p-2 draftBtn">Draft</div>
                                @endif
                            </div>
                        </div>

                        {{-- Section Navigation Button --}}
                        <div class="d-flex mt-4">

                            <a href="{{route("posts.index")}}"><button type="button" class="btn plainBtn">Return to Dashboard</button></a>

                            <a href="{{route("posts.edit", $post->id)}}"><button type="button" class="btn plainBtn mx-3">Update</button></a>

                            <form action="{{route("posts.destroy", $post->id)}}" method="POST" >
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn deleteBtn">Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection