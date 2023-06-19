@extends('layout.master')

@section('content')
    <div class="container" style="padding-left:10rem;">
        <div class="card" style="margin-top: 10rem; width: 50rem">
            <div class="card-body" style="background-color: #fff">

                <div class="row">
                    <div class="col-4">
                        <h1>Create Post</h1>
                    </div>
                    <div class="col-2 offset-6">
                        <a href="{{ route('post#readPage') }}"><button class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div>
                <form action="{{ route('post#create') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control mt-1 " placeholder="Enter title" required>
                    </div>
                    <div class="form-group mt-4">
                        <label for="description">Description</label>
                        <textarea class="form-control mt-1" name="description" id="description" rows="3" placeholder="Enter description"
                            required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
