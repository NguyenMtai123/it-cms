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

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th width="150">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($pages as $page)
                        <tr>

                            <td>{{ $page->id }}</td>

                            <td>{{ $page->name }}</td>

                            <td>{{ $page->slug }}</td>

                            <td>
                                {!! $page->status
                                    ? '<span class="badge badge-success">Published</span>'
                                    : '<span class="badge badge-secondary">Draft</span>' !!}
                            </td>

                            <td>

                                <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('pages.destroy', $page->id) }}"
                                    style="display:inline-block">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this page?')">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

            {{ $pages->links() }}

        </div>

    </div>

@endsection
