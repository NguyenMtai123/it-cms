@extends('base::layouts.master')

@section('title', 'Admissions')

@section('page-header')

    <div class="d-flex justify-content-between">

        <div>

            <h1 class="mb-0">
                Admissions
            </h1>

            <small class="text-muted">
                Quản lý thông tin tuyển sinh
            </small>

        </div>
    </div>
    <div class="d-flex justify-content-end">

        <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">

            <i class="fas fa-plus"></i>
            Thêm mới

        </button>

    </div>

@endsection

@section('content')

    <div class="card card-outline card-primary">

        <div class="card-body p-0">

            <table class="table table-hover">

                <thead>

                    <tr>

                        <th width="80">#</th>

                        <th>Title</th>

                        <th>URL</th>

                        <th width="120">Sort</th>

                        <th width="120">Status</th>

                        <th width="180"></th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($items as $item)
                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>

                            <td>{{ $item->url }}</td>

                            <td>{{ $item->sort_order }}</td>

                            <td>

                                @if ($item->status)
                                    <span class="badge badge-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge badge-danger">
                                        Disabled
                                    </span>
                                @endif

                            </td>

                            <td>

                                <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $item->id }}">

                                    <i class="fas fa-edit"></i>

                                </button>

                                <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $item->id }}"
                                    data-title="{{ $item->title }}">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>
            <div class="modal fade" id="createModal">

                <div class="modal-dialog modal-lg">

                    <form action="{{ route('admissions.store') }}" method="POST">

                        @csrf

                        <div class="modal-content">

                            <div class="modal-header">

                                <h4>
                                    Thêm Admission
                                </h4>

                            </div>

                            <div class="modal-body">

                                @include('admission::admin.partials.form')

                            </div>

                            <div class="modal-footer">

                                <button class="btn btn-primary">

                                    Lưu

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
    <div class="modal fade" id="deleteModal">

        <div class="modal-dialog">

            <form id="deleteForm" method="POST">

                @csrf
                @method('DELETE')

                <div class="modal-content">

                    <div class="modal-header bg-danger">

                        <h4>
                            Xác nhận xóa
                        </h4>

                    </div>

                    <div class="modal-body">

                        Xóa:

                        <strong id="deleteTitle"></strong>

                        ?

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">

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
    <div class="modal fade" id="editModal">

        <div class="modal-dialog modal-lg">

            <form id="editForm" method="POST">

                @csrf
                @method('PUT')

                <div class="modal-content">

                    <div class="modal-header bg-warning">

                        <h4 class="modal-title">

                            <i class="fas fa-edit mr-2"></i>
                            Chỉnh sửa Admission

                        </h4>

                        <button type="button" class="close" data-dismiss="modal">

                            <span>&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-8">

                                <div class="form-group">

                                    <label>
                                        Tiêu đề
                                    </label>

                                    <input id="edit_title" type="text" name="title" class="form-control" required>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>
                                        Thứ tự
                                    </label>

                                    <input id="edit_sort_order" type="number" name="sort_order" class="form-control">

                                </div>

                            </div>

                        </div>

                        <div class="form-group">

                            <label>
                                URL
                            </label>

                            <input id="edit_url" type="text" name="url" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>
                                Mô tả
                            </label>

                            <textarea id="edit_description" name="description" rows="4" class="form-control"></textarea>

                        </div>

                        <div class="form-group mb-0">

                            <div class="custom-control custom-switch">

                                <input id="edit_status" type="checkbox" name="status" class="custom-control-input">

                                <label class="custom-control-label" for="edit_status">

                                    Kích hoạt

                                </label>

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">

                            Hủy

                        </button>

                        <button type="submit" class="btn btn-warning">

                            <i class="fas fa-save mr-1"></i>
                            Cập nhật

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>
@endsection
@push('scripts')
    <script>
        $('.edit-btn').click(function() {

            let id = $(this).data('id');

            $.get(
                '/admin/admissions/' + id,
                function(data) {

                    $('#edit_title')
                        .val(data.title);

                    $('#edit_description')
                        .val(data.description);

                    $('#edit_url')
                        .val(data.url);

                    $('#edit_sort_order')
                        .val(data.sort_order);

                    $('#edit_status')
                        .prop(
                            'checked',
                            data.status
                        );

                    $('#editForm').attr(
                        'action',
                        '/admin/admissions/' + id
                    );

                    $('#editModal').modal('show');
                }
            );

        });
        $('.delete-btn').click(function() {

            let id = $(this).data('id');

            $('#deleteTitle').text(
                $(this).data('title')
            );

            $('#deleteForm').attr(
                'action',
                '/admin/admissions/' + id
            );

            $('#deleteModal').modal('show');
        });
    </script>
@endpush
