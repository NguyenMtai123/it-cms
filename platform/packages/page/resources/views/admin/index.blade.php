@extends('base::layouts.master')

@section('title', 'Pages')

@section('page-header')
<div class="row">
    <div class="col-sm-6">
        <h1>Pages</h1>
    </div>

    <div class="col-sm-6 text-right">
        <a href="{{ route('pages.create') }}" class="btn btn-primary">
            Create Page
        </a>
    </div>
</div>
@endsection

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">

    <div class="card-body p-0">

        <table class="table table-hover table-striped mb-0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th width="180">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>
                        @if($page->status)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-secondary">Draft</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('pages.destroy', $page->id) }}"
                              method="POST"
                              style="display:inline-block">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this page?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>

</div>

<div class="mt-3">
    {{ $pages->links() }}
</div>

@endsection
