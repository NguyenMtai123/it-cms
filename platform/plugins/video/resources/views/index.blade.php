@extends('base::layouts.master')

@section('title', 'Videos')

@section('page-header')

    <div class="d-flex justify-content-between align-items-center">

        <h1 class="m-0">
            Videos
        </h1>

        <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">
            <i class="fas fa-plus"></i>
            Create Video
        </button>

    </div>
@endsection

@section('content')
    <div class="card card-outline card-primary">

        <div class="card-body p-0">

            <table class="table table-hover mb-0">

                <thead>

                    <tr>

                        <th width="80" class="text-center">
                            #
                        </th>

                        <th>
                            Video
                        </th>

                        <th width="120">
                            Sort
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

                    @forelse($videos as $video)
                        <tr>

                            <td class="text-center">

                                {{ ($videos->currentPage() - 1) * $videos->perPage() + $loop->iteration }}

                            </td>

                            <td>

                                <div class="d-flex">

                                    <img src="https://img.youtube.com/vi/{{ last(explode('/', $video->embed_url)) }}/mqdefault.jpg"
                                        width="120" height="70" style="object-fit:cover" class="mr-3">

                                    <div>

                                        <strong>
                                            {{ $video->title }}
                                        </strong>

                                        <br>

                                        <small class="text-muted">

                                            {{ $video->embed_url }}

                                        </small>

                                    </div>

                                </div>

                            </td>

                            <td>
                                {{ $video->sort_order }}
                            </td>

                            <td>

                                @if ($video->status)
                                    <span class="badge badge-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge badge-secondary">
                                        Hidden
                                    </span>
                                @endif

                            </td>

                            <td>

                                <button type="button" class="btn btn-warning btn-sm editBtn" data-id="{{ $video->id }}"
                                    data-title="{{ $video->title }}" data-url="{{ $video->embed_url }}"
                                    data-sort="{{ $video->sort_order }}" data-status="{{ $video->status }}"
                                    data-description="{{ $video->description }}">

                                    <i class="fas fa-edit"></i>

                                </button>

                                <button type="button" class="btn btn-danger btn-sm deleteBtn"
                                    data-id="{{ $video->id }}" data-title="{{ $video->title }}">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-4">

                                No videos found

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>
            <div class="d-flex justify-content-center py-3 border-top">

                {{ $videos->links() }}

            </div>

        </div>

    </div>

    {{-- CREATE MODAL --}}

    <div class="modal fade" id="createModal">

        <div class="modal-dialog">

            <form method="POST" action="{{ route('videos.store') }}">

                @csrf

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">

                            Create Video

                        </h4>

                        <button type="button" class="close" data-dismiss="modal">
                            ×
                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Title</label>

                            <input type="text" name="title" class="form-control" required>

                        </div>

                        <div class="form-group">

                            <label>Youtube URL</label>

                            <input type="text" name="embed_url" class="form-control"
                                placeholder="https://www.youtube.com/watch?v=xxxx" required>

                        </div>
                        <div class="form-group">

                            <label>Description</label>

                            <textarea name="description" rows="3" class="form-control"></textarea>

                        </div>

                        <div class="form-group">

                            <label>Sort Order</label>

                            <input type="number" name="sort_order" value="0" class="form-control">

                        </div>

                        <div class="form-check">

                            <input checked type="checkbox" value="1" name="status" class="form-check-input"
                                id="create_status">

                            <label class="form-check-label" for="create_status">
                                Active
                            </label>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button class="btn btn-primary">

                            Save

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- EDIT MODAL --}}

    <div class="modal fade" id="editModal">

        <div class="modal-dialog">

            <form id="editForm" method="POST">

                @csrf
                @method('PUT')

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">

                            Edit Video

                        </h4>

                        <button type="button" class="close" data-dismiss="modal">
                            ×
                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Title</label>

                            <input id="edit_title" type="text" name="title" class="form-control" required>

                        </div>

                        <div class="form-group">

                            <label>Youtube URL</label>

                            <input id="edit_url" type="text" name="embed_url" class="form-control" required>

                        </div>
                        <div class="form-group">

                            <label>Description</label>

                            <textarea id="edit_description" name="description" rows="3" class="form-control"></textarea>

                        </div>

                        <div class="form-group">

                            <label>Sort Order</label>

                            <input id="edit_sort" type="number" name="sort_order" class="form-control">

                        </div>

                        <div class="form-check">

                            <input id="edit_status" type="checkbox" value="1" name="status"
                                class="form-check-input">

                            <label class="form-check-label" for="edit_status">
                                Active
                            </label>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button class="btn btn-primary">

                            Update

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- DELETE MODAL --}}

    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog modal-sm">

            <form id="deleteForm" method="POST">

                @csrf
                @method('DELETE')

                <div class="modal-content">

                    <div class="modal-header bg-danger">

                        <h4 class="modal-title">

                            Delete

                        </h4>

                    </div>

                    <div class="modal-body">

                        <p class="mb-0">

                            Delete
                            <strong id="deleteTitle"></strong>
                            ?

                        </p>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cancel
                        </button>

                        <button class="btn btn-danger">
                            Delete
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

@endsection

@push('scripts')
    <script>
        $(function() {

            $('.editBtn').click(function() {

                let id = $(this).data('id');

                $('#editForm').attr(
                    'action',
                    '/admin/videos/' + id
                );

                $('#edit_title')
                    .val($(this).data('title'));

                $('#edit_url')
                    .val($(this).data('url'));

                $('#edit_description')
                    .val(
                        $(this).data('description')
                    );

                $('#edit_sort')
                    .val($(this).data('sort'));

                $('#edit_status')
                    .prop(
                        'checked',
                        $(this).data('status') == 1
                    );

                $('#editModal')
                    .modal('show');

            });

            $('.deleteBtn').click(function() {

                let id = $(this).data('id');

                $('#deleteForm').attr(
                    'action',
                    '/admin/videos/' + id
                );

                $('#deleteTitle')
                    .text(
                        $(this).data('title')
                    );

                $('#deleteModal')
                    .modal('show');

            });

        });
    </script>
@endpush
