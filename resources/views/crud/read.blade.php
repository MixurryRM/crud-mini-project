@extends('layout.master')

@section('content')
    <div class="container mt-5">
        @if (session('deleteSuccess'))
            <div class="col-4 offset-8">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class=" fa-solid fa-circle-xmark"></i> {{ session('deleteSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session('updateSuccess'))
            <div class="col-4 offset-8">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class=" fa-solid fa-circle-xmark"></i> {{ session('updateSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <a href="{{ route('post#createPage') }}" class="btn btn-default">Back</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Create Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td><img src="{{ asset('storage/' . $p->image) }}" class="shadow-sm w-100" style="height:40px"></td>
                        <td>{{ $p->title }}</td>
                        <td>{{ $p->description }}</td>
                        <td>{{ $p->created_at->format('j-F-Y') }}</td>
                        <td>
                            <div class="table-data-feature d-flex ml-2">
                                <a href="{{ route('post#editPage', $p->id) }}" class=" mr-2">
                                    <button class="btn me-1 bg-primary" data-toggle="tooltip" data-placement="top"
                                        title="Edit">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </a>
                                <a href="{{ route('post#delete', $p->id) }}">
                                    <button class="btn me-1 bg-danger" data-toggle="tooltip" data-placement="top"
                                        title="Delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-3">
            {{-- {{ $post->links() }} --}}
            {{ $post->appends(request()->query())->links() }}
        </div>
    </div>

    </html>
@endsection
