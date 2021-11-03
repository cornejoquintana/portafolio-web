@extends('..layouts.admin')

@section('content')

<h1 class="mt-4">Tables</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">List Pos</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
        .
    </div>
</div>


<div class="container-fluid px-4">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            @if($errors->any())
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        {{$errors->first()}}
                    </div>
                </div>
            @endif
            @if (session('status'))
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">¿Te sientes inspirado?</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('posts.create') }}">Create new post</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        List Pos
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Creation</th>
                    <th scope="col">Author</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at->format('j F, Y') }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>
                        @if ($post->is_draft)
                            <div class="text-red-500">In draft</div>
                        @else
                            <div class="text-green-500">Published</div>
                        @endif
                    </td>
                    <td>
                        <a class="" href="{{ route('posts.edit', $post) }}" title="Edit">Edit</a>
                    </td>
                    <td>
                        <a class="" href="{{ route('posts.destroy', $post) }}" title="Delete" data-id="{{$post->id}}">Delete</a>
                        <form id="posts.destroy-form-{{$post->id}}" action="{{ route('posts.destroy', $post) }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                            @method('DELETE')
                        </form>
                    </td>
            @endforeach
            </tbody>
        </table>
        <div class="container">
            <div class="row">
              <div class="col d-flex justify-content-center">
                <nav aria-label="..." class="alin">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        <li class="page-item">
                            </li><a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">2</span>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
              </div>
            </div>
          </div>
    </div>
</div>

<script>

    var delete_post_action = document.getElementsByClassName("delete-post");

    var deleteAction = function(e) {
        event.preventDefault();
        var id = this.dataset.id;
        if(confirm('Are you sure?')) {
            document.getElementById('posts.destroy-form-' + id).submit();
        }
        return false;
    }

    for (var i = 0; i < delete_post_action.length; i++) {
        delete_post_action[i].addEventListener('click', deleteAction, false);
    }
</script>
@endsection
