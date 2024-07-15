@extends('admin.layout.master')

@section('content')
    <div class="container">
        <embed src="{{ Storage::url($library->path) }}" type="application/pdf" width="100%" height="600px" />
    </div>
@endsection
