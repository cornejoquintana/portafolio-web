@extends('..layouts.admin')

@section('content')

<h1 class="mt-4">Tables</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('posts.store') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('posts.store') }}">List Pos</a></li>
    <li class="breadcrumb-item active">New Post</li>
</ol>

<div class="card mb-4">
    <div class="card-body">
        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>.
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        New Post
    </div>
    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titulo</label>
                <input class="form-control"  type="text" name="title" value="{{ old('title') }}" placeholder="Write the title of the post" required>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Contenido</label>
                <textarea class="form-control"  name="body" placeholder="Write your post here" required>{{ old('body') }}</textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="hidden" class="form-check-input" name="is_draft" value="0">
                <input type="checkbox" class="form-check-input" name="is_draft" value="1"> Is draft?
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

<script>
    tinymce.init({
        selector: 'textarea',
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'table emoticons template paste help'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
</script>

@endsection
