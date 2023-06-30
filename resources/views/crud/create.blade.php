@extends('layout.master')

@section('content')
    <div class="container" style="padding-left:10rem;">
        <div class="card" style="margin-top: 8rem; width: 50rem">
            <div class="card-body" style="background-color: #fff">

                <div class="row">
                    <div class="col-4">
                        <h1>Create Post</h1>
                    </div>
                    <div class="col-2 offset-6">
                        <a href="{{ route('post#readPage') }}"><button class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div>
                <form action="{{ route('post#create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control mt-1 @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control mt-1 @error('title') is-invalid @enderror"
                            placeholder="Enter title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="description">Description</label>
                        <textarea class="form-control mt-1 @error('description') is-invalid @enderror" name="description" id="description"
                            rows="3" placeholder="Enter description"></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
