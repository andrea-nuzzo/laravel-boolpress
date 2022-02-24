@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header"><h2> New Categories</h2></div>
                    <div class="m-3">
                        <div class="card-body rounded border border-dark mb-3"> 
                            <form action="{{route("categories.store")}}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Add name category">
                                    @error('name')
                                     <div class="alert alert-danger my-2"> {{$message}}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn updateBtn">Creates</button>
                            </form>
                        </div>
                        <div class="d-flex">
                            <div class="my-2">
                                <a href="{{route("categories.index")}}"><button type="button" class="btn  updateBtn">Return to Index</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection