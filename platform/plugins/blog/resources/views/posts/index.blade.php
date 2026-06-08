@extends('base::layouts.master')

@section('title', 'Posts')

@section('page-header')

    <div class="d-flex justify-content-between">

        <h1>Posts</h1>

        <a href="{{ route('blog.posts.create') }}" class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Create Post

        </a>

    </div>

@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="card-header">

            <h3 class="card-title">
                Post Management
            </h3>

        </div>

        <div class="card-body p-0">

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>
                        <th width="60">ID</th>
                        <th>
                            Title
                        </th>

                        <th>
                            Author
                        </th>

                        <th>
                            Category
                        </th>

                        <th width="120">
                            Status
                        </th>

                        <th width="180">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($posts as $post)

                        <tr>

                            <td>
                                {{ $post->id }}
                            </td>


                            {{-- TITLE --}}
                            <td>

                                <strong>
                                    {{ $post->title }}
                                </strong>

                                <br>

                                <small class="text-muted">
                                    {{ $post->slug }}
                                </small>

                            </td>

                            {{-- AUTHOR --}}
                            <td>

                                {{ $post->author?->email ?? '-' }}

                            </td>

                            {{-- CATEGORY --}}
                            <td>

                                @foreach ($post->categories as $category)
                                    <span class="badge badge-info">

                                        {{ $category->name }}

                                    </span>
                                @endforeach

                            </td>

                            {{-- STATUS --}}
                            <td>

                                @if ($post->status)
                                    <span class="badge badge-success">
                                        Published
                                    </span>
                                @else
                                    <span class="badge badge-warning">
                                        Draft
                                    </span>
                                @endif

                                @if ($post->is_featured)
                                    <br>

                                    <span class="badge badge-danger mt-1">
                                        Featured
                                    </span>
                                @endif

                            </td>

                            {{-- ACTIONS --}}
                            <td>

                                <a href="{{ route('blog.posts.edit', $post->id) }}" class="btn btn-sm btn-warning">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form action="{{ route('blog.posts.destroy', $post->id) }}" method="POST"
                                    style="display:inline">

                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Delete this post?')" class="btn btn-sm btn-danger">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center">

                                No posts found

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer">

            {{ $posts->links() }}

        </div>

    </div>

@endsection
