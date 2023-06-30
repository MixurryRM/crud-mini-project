@extends('layout.master')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 offset-8">
                        <a href="{{ route('post#readPage') }}"><button class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div>
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class=""><a href="{{ route('post#readPage') }}"><i
                                        class=" fa-solid fa-arrow-left text-black"></i></a>
                            </div>
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Your Post</h3>
                            </div>
                            <hr>
                            <form action="{{ route('post#update') }}" enctype="multipart/form-data" method="post"
                                novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" name="id" value="{{ $post->id }}">
                                        <div class="">
                                            <img src="{{ asset('storage/' . $post->image) }}" class="mb-3 ms-4 p-2"
                                                style="height: 200px;">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-control">
                                                <input type="file" name="image" @error('image') is-invalid @enderror>
                                                @error('image')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Title</label>
                                            <input id="cc-pament" name="title" value="{{ old('title', $post->title) }}"
                                                type="text" class="form-control @error('title') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Country...">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Description</label>
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="10"
                                                rows="5">{{ old('description', $post->description) }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Update</span>
                                        <i class="fa-solid fa-circle-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
