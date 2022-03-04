@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header backgroundLight">Crea un nuovo Post</h2></div>

                    <div class="card-body"> 
                        <form action="{{route("posts.store")}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Form Title --}}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Add title" value="{{old('title')}}">
                                @error('title')
                                 <div class="alert alert-danger my-2"> {{$message}}</div>
                                @enderror
                            </div>

                            {{-- Textarea Content --}}
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Add text" rows="8">{{old('content')}}</textarea>
                                @error('content')
                                 <div class="alert alert-danger my-2"> {{$message}}</div>
                                @enderror
                            </div>

                            {{-- Select Categories --}}
                            <div class="form-group">
                                <label for="category">Categories</label>
                                <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id" id="category">
                                    <option value="">Choose a categories</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{old('title') == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                 <div class="alert alert-danger my-2"> {{$message}}</div>
                                @enderror
                            </div>

                            {{-- Check Tags --}}
                            <p>Tag</p>
                            <div class="form-group form-check d-flex">
                                @foreach ($tags as $tag)
                                    <div class="custom-control custom-checkbox mx-2">
                                        <input type="checkbox" class="custom-control-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{in_array($tag->id, old("tags", [])) ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('tags')
                                <div class="alert alert-danger my-2"> {{$message}}</div>
                            @enderror
                            
                            {{-- Section Upload Image --}}
                            <div class="form-group my-4">
                            
                                <label for="exampleFormControlFile1">Add a image</label>
                                <div class="d-flex align-items-center">
                                    <img id="uploadPreview" width="100" src="https://www.pngkey.com/png/detail/233-2332677_image-500580-placeholder-transparent.png">
                                    <input type="file" class="form-control-file mx-3" id="image" name="image" onchange="PreviewImage();">
                                </div>
                                
                                {{-- This function allows you to have the preview of the image --}}
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

                            {{-- Check Published --}}
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" name="published" id="published" {{old('published') ? 'checked': ''}} >
                                <label class="form-check-label" for="published">Published</label>
                                @error('published')
                                 <div class="alert alert-danger my-2"> {{$message}}</div>
                                @enderror
                            </div>

                        {{-- Section Navigation Button --}}
                        <button type="submit" class="btn plainBtn">Creates</button>
                            <a href="{{route("posts.index")}}"><button type="button" class="btn plainBtn">Return to Dashboard</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection