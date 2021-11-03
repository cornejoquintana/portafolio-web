@extends('..layouts.admin')

@section('content')

<h1 class="mt-4">Tables</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('posts.store') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('posts.store') }}">List Pos</a></li>
    <li class="breadcrumb-item active">Edit Post</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
        .
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Edit Post
    </div>
    <div class="card-body">
        <form action="{{ route('posts.update', $post) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titulo</label>
                <input class="form-control"  type="text" name="title" value="{{ $post->title }}" placeholder="Write the title of the post">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Contenido</label>
                <textarea class="form-control"  name="body" placeholder="Write your post here" required>{{ $post->body }}</textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="hidden" class="form-check-input" name="is_draft" value="0">
                @if (!$post->is_draft)
                    <input type="checkbox" class="form-check-input" name="is_draft" class="is_draft" value="1">
                @else
                    <input type="checkbox" class="form-check-input" name="is_draft" class="is_draft" value="1" checked>
                @endif
                <label class="form-check-label" for="is_draft">Is draft?</label>
            </div>
            <input type="submit" value="SEND" class="btn btn-primary">
            @if (session('status'))
                <div class="">
                    {{ session('status') }}
                </div>
            @endif
            @if($errors->any())
            <div class="">
                {{$errors->first()}}
            </div>
            @endif
        </form>
    </div>
</div>

@endsection
