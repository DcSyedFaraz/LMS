@extends('admin.layout.master')

@section('content')
    <div class="container">
        @if (auth()->user()->hasRole('admin'))
            <form action="{{ route('library.store') }}" method="POST" class="my-3" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="file">PDF</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        @endif
        <div class="row my-3">
            @forelse ($libraries as $library)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $library->title }}</h5>
                            <a href="{{ route('library.show', $library) }}" class="btn btn-primary">View</a>
                            <a href="{{ asset('storage/' . $library->path) }}" download="{{ $library->title }}"
                                class="btn btn-secondary">Download</a>
                            @if (auth()->user()->hasRole('admin'))
                                <a href="{{ route('library.destroy', $library->id) }}" class="btn btn-danger">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p>No Books Available</p>
            @endforelse
        </div>
    </div>
@endsection
