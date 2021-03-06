@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Modifica il Post</h2></div>

                    <div class="card-body"> 
                        <form action="{{route("posts.update", $post->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Add title" value="{{old('title') ? old('title') : $post->title }}">
                                @error('title')
                                 <div class="alert alert-danger my-2"> {{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Add text" rows="8">{{old('content') ? old('content') : $post->content}}</textarea>
                                @error('content')
                                 <div class="alert alert-danger my-2"> {{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Categories</label>
                                <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id" id="category">
                                    <option value="">Choose a categories</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{old('title', $post->category_id) == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                 <div class="alert alert-danger my-2"> {{$message}}</div>
                                @enderror
                            </div>

                            <p>Tag</p>
                            <div class="form-group form-check d-flex">
                                @foreach ($tags as $tag)
                                    @if (old("tags"))
                                        <div class="btn-group-toggle mx-2  " data-toggle="buttons">
                                            <label class="btn btn-secondary active" for="{{$tag->slug}}">
                                            <input type="checkbox" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{in_array($tag->id, old("tags", [])) ? 'checked' : ''}}> {{$tag->name}}
                                            </label>
                                        </div>
                                    @else
                                        <div class="btn-group-toggle mx-2  " data-toggle="buttons">
                                            <label class="btn btn-secondary active" for="{{$tag->slug}}">
                                            <input type="checkbox" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{$post->tags->contains($tag) ? 'checked' : ''}}> {{$tag->name}}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                                @error('tags')
                                    <div class="alert alert-danger my-2"> {{$message}}</div>
                                @enderror
                            
                            <div class="form-group my-4">
                                
                                <label for="exampleFormControlFile1">Add a image</label>
                                <div class="d-flex align-items-center">
                                    @if ($post->image)
                                        <img id="uploadPreview" width="100" src="{{asset("storage/{$post->image}")}}" alt="{{$post->title}}">
                                    @else 
                                    <img id="uploadPreview" width="100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTW3lzH45w9milEJzJv9h1ZlCiSYgtTM7j0Ng&usqp=CAU">
                                    @endif
                                    <input type="file" class="form-control-file mx-3" id="image" name="image" onchange="PreviewImage();">
                                </div>
                                
                                {{-- PreviewImage --}}
                                <script type="text/javascript">
                                    function PreviewImage() {
                                        var oFReader = new FileReader();
                                        oFReader.readAsDataURL(document.getElementById("image").files[0]);

                                        oFReader.onload = function (oFREvent){
                                            document.getElementById("uploadPreview").src= oFREvent.target.result;
                                        };
                                    };
                                </script>
                            </div>

                            <div class="form-group form-check">
                                @php
                                    $published = old('published') ? old('published') : $post->published;
                                @endphp
                                <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" name="published" id="published" {{$published ? 'checked': ''}} >
                                <label class="form-check-label" for="published">Published</label>
                                @error('published')
                                 <div class="alert alert-danger my-2"> {{$message}}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn updateBtn">Update</button>

                            <a href="{{route("posts.index")}}"><button type="button" class="btn  showBtn">Return to Dashboard</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection