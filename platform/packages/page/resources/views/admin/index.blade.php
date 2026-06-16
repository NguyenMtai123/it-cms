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
                    @foreach ($pages as $page)
                        <tr>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->slug }}</td>
                            <td>
                                @if ($page->status)
                                    <span class="badge badge-success">Published</span>
                                @else
                                    <span class="badge badge-secondary">Draft</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $page->id }}"
                                    data-title="{{ $page->title }}">
                                    Delete
                                </button>
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
<div class="modal fade" id="deleteModal">

    <div class="modal-dialog">

        <form id="deleteForm" method="POST">

            @csrf
            @method('DELETE')

            <div class="modal-content">

                <div class="modal-header bg-danger text-white">

                    <h5>Xác nhận xóa</h5>

                </div>

                <div class="modal-body">

                    Bạn có chắc muốn xóa:

                    <strong id="pageTitle"></strong>

                    ?

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                        Hủy
                    </button>

                    <button class="btn btn-danger">

                        Xóa

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>
@endsection
@push('scripts')

<script>

$(function(){

    $('.delete-btn').click(function(){

        let id = $(this).data('id');
        let title = $(this).data('title');

        $('#pageTitle').text(title);

        $('#deleteForm').attr(
            'action',
            '/admin/pages/' + id
        );

        $('#deleteModal').modal('show');

    });

});

</script>

@endpush
