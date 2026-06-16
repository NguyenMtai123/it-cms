@extends('base::layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">
                    Liên kết Footer
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
                            <th>Tiêu đề</th>

                            <th width="180">Nhóm</th>

                            <th>Link</th>

                            <th width="80">Vị trí</th>

                            <th width="100">Trạng thái</th>

                            <th width="150">Thao tác</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($items as $item)
                            <tr>

                                <td class="text-center">

                                    {{ ($items->currentPage() - 1) * $items->perPage() + $loop->iteration }}

                                </td>

                                <td>
                                    {{ $item->title }}
                                </td>

                                <td>

                                    @if ($item->group == 'organization')
                                        <span class="badge badge-info">
                                            Cơ cấu tổ chức
                                        </span>
                                    @else
                                        <span class="badge badge-success">
                                            Liên kết nhanh
                                        </span>
                                    @endif

                                </td>

                                <td>
                                    {{ $item->url }}
                                </td>

                                <td>
                                    {{ $item->sort_order }}
                                </td>

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
                                        data-title="{{ $item->title }}" data-group="{{ $item->group }}"
                                        data-url="{{ $item->url }}" data-sort="{{ $item->sort_order }}"
                                        data-status="{{ $item->status }}">

                                        <i class="fas fa-edit"></i>

                                    </button>

                                    <button class="btn btn-danger btn-sm btnDelete" data-id="{{ $item->id }}">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </td>

                            </tr>
                        @empty

                            <tr>

                                <td colspan="7" class="text-center py-4">

                                    <i class="fas fa-link fa-2x text-muted mb-2 d-block"></i>

                                    Chưa có liên kết nào

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>
                <div class="card-footer bg-white">

                    <div class="d-flex justify-content-center">

                        {{ $items->links() }}

                    </div>

                </div>
            </div>

        </div>

    </div>

    {{-- CREATE MODAL --}}

    <div class="modal fade" id="createModal">

        <div class="modal-dialog">

            <form action="{{ route('footer-link.store') }}" method="POST">

                @csrf

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">
                            Thêm liên kết
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

                            <label>Nhóm</label>

                            <select name="group" class="form-control">

                                <option value="organization">

                                    Cơ cấu tổ chức

                                </option>

                                <option value="quick">

                                    Liên kết nhanh

                                </option>

                            </select>

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
                            Cập nhật liên kết
                        </h4>

                        <button type="button" class="close" data-dismiss="modal">

                            &times;

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Tiêu đề</label>

                            <input type="text" id="edit_title" name="title" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>Nhóm</label>

                            <select id="edit_group" name="group" class="form-control">

                                <option value="organization">

                                    Cơ cấu tổ chức

                                </option>

                                <option value="quick">

                                    Liên kết nhanh

                                </option>

                            </select>

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

    {{-- DELETE MODAL --}}

    <div class="modal fade" id="deleteModal">

        <div class="modal-dialog">

            <form id="deleteForm" method="POST">

                @csrf
                @method('DELETE')

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">
                            Xác nhận xóa
                        </h4>

                    </div>

                    <div class="modal-body">

                        Bạn có chắc muốn xóa liên kết này?

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
@endsection

@push('scripts')
    <script>
        $('.btnEdit').click(function() {

            let id = $(this).data('id');

            $('#edit_title').val($(this).data('title'));
            $('#edit_group').val($(this).data('group'));
            $('#edit_url').val($(this).data('url'));
            $('#edit_sort').val($(this).data('sort'));
            $('#edit_status').val($(this).data('status'));

            $('#editForm').attr(
                'action',
                '/admin/footer-links/' + id
            );

            $('#editModal').modal('show');

        });

        $('.btnDelete').click(function() {

            let id = $(this).data('id');

            $('#deleteForm').attr(
                'action',
                '/admin/footer-links/' + id
            );

            $('#deleteModal').modal('show');

        });
    </script>
@endpush
