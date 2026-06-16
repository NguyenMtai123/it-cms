@extends('base::layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">

            <div class="card-header">

                <h3 class="card-title">
                    Tìm hiểu về NTU
                </h3>

                <div class="card-tools">

                    <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">

                        <i class="fas fa-plus"></i>
                        Thêm mới

                    </button>

                </div>

            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover">

                    <thead>

                        <tr>
                            <th width="60" class="text-center">STT</th>
                            <th width="80">Icon</th>
                            <th>Tiêu đề</th>
                            <th>Link</th>
                            <th width="80">Vị trí</th>
                            <th width="100">Trạng thái</th>
                            <th width="160">Thao tác</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($items as $item)
                            <tr>

                                <td class="text-center">

                                    {{ ($items->currentPage() - 1) * $items->perPage() + $loop->iteration }}

                                </td>
                                <td class="text-center">

                                    <i class="{{ $item->icon }}"></i>

                                </td>

                                <td>{{ $item->title }}</td>

                                <td>{{ $item->url }}</td>

                                <td>{{ $item->sort_order }}</td>

                                <td>

                                    @if ($item->status)
                                        <span class="badge badge-success">
                                            Hiển thị
                                        </span>
                                    @else
                                        <span class="badge badge-danger">
                                            Ẩn
                                        </span>
                                    @endif

                                </td>

                                <td>

                                    <button class="btn btn-warning btn-sm btnEdit" data-id="{{ $item->id }}"
                                        data-title="{{ $item->title }}" data-icon="{{ $item->icon }}"
                                        data-url="{{ $item->url }}" data-sort="{{ $item->sort_order }}"
                                        data-status="{{ $item->status }}">

                                        <i class="fas fa-edit"></i>

                                    </button>

                                    <button class="btn btn-danger btn-sm btnDelete" data-id="{{ $item->id }}">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
                <div class="row mt-3">

                    <div class="col-md-12 d-flex justify-content-center">

                        {{ $items->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- CREATE MODAL --}}

    <div class="modal fade" id="createModal">

        <div class="modal-dialog">

            <form action="{{ route('about-link.store') }}" method="POST">

                @csrf

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">
                            Thêm mới
                        </h4>

                        <button type="button" class="close" data-dismiss="modal">

                            &times;

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Tiêu đề</label>

                            <input type="text" name="title" class="form-control" required>

                        </div>

                        <div class="form-group">

                            <label>Icon</label>

                            <input type="text" name="icon" class="form-control" placeholder="Ví dụ: fa fa-map-marker">

                            <small class="text-muted">

                                Ví dụ:
                                fa fa-map-marker,
                                fa fa-home,
                                fa fa-video-camera,
                                fa fa-users

                            </small>

                        </div>

                        <div class="form-group">

                            <label>Link</label>

                            <input type="text" name="url" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>Thứ tự</label>

                            <input type="number" name="sort_order" value="0" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>Trạng thái</label>

                            <select name="status" class="form-control">

                                <option value="1">
                                    Hiển thị
                                </option>

                                <option value="0">
                                    Ẩn
                                </option>

                            </select>

                        </div>

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

    {{-- EDIT MODAL --}}

    <div class="modal fade" id="editModal">
        <div class="modal-dialog">

            <form id="editForm" method="POST">

                @csrf
                @method('PUT')

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">
                            Cập nhật
                        </h4>

                    </div>

                    <div class="modal-body">

                        <input type="hidden" id="edit_id">

                        <div class="form-group">

                            <label>Tiêu đề</label>

                            <input type="text" id="edit_title" name="title" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>Icon</label>

                            <input type="text" id="edit_icon" name="icon" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>Link</label>

                            <input type="text" id="edit_url" name="url" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>Thứ tự</label>

                            <input type="number" id="edit_sort" name="sort_order" class="form-control">

                        </div>
                        <div class="form-group">

                            <label>Trạng thái</label>

                            <select id="edit_status" name="status" class="form-control">

                                <option value="1">
                                    Hiển thị
                                </option>

                                <option value="0">
                                    Ẩn
                                </option>

                            </select>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button class="btn btn-primary">

                            Cập nhật

                        </button>

                    </div>

                </div>

            </form>

        </div>
    </div>
    <div class="modal fade" id="deleteModal">

        <div class="modal-dialog modal-sm">

            <form id="deleteForm" method="POST">

                @csrf
                @method('DELETE')

                <div class="modal-content">

                    <div class="modal-header bg-danger">

                        <h5 class="modal-title">

                            Xác nhận xóa

                        </h5>

                        <button type="button" class="close" data-dismiss="modal">

                            <span>&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        Bạn có chắc muốn xóa mục này?

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">

                            Hủy

                        </button>

                        <button type="submit" class="btn btn-danger">

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
        $('.btnEdit').click(function() {

            let id = $(this).data('id');

            $('#edit_title').val($(this).data('title'));
            $('#edit_icon').val($(this).data('icon'));
            $('#edit_url').val($(this).data('url'));
            $('#edit_sort').val($(this).data('sort'));
            $('#edit_status').val($(this).data('status'));

            $('#editForm').attr(
                'action',
                '/admin/about-links/' + id
            );

            $('#editModal').modal('show');

        });

        $('.btnDelete').click(function() {

            let id = $(this).data('id');

            $('#deleteForm').attr(
                'action',
                '/admin/about-links/' + id
            );

            $('#deleteModal').modal('show');

        });
    </script>
@endpush
