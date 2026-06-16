@extends('base::layouts.master')

@section('title', 'Quick Links')

@section('page-header')

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h1 class="mb-0">
                Quick Links
            </h1>

            <small class="text-muted">
                Quản lý các khối liên kết trang chủ
            </small>

        </div>

        <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">

            <i class="fas fa-plus mr-1"></i>

            Thêm mới

        </button>

    </div>

@endsection

@section('content')
    <div class="card">

        <div class="card-body p-0">

            <table class="table table-hover mb-0">

                <thead>

                    <tr>

                        <th width="80">#</th>

                        <th>Title</th>

                        <th>Subtitle</th>

                        <th width="120">Sort</th>
                        <th width="100">
                            Color
                        </th>

                        <th width="120">Status</th>

                        <th width="180"></th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($items as $item)
                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                <div class="font-weight-bold">

                                    {{ $item->title }}

                                </div>

                                <small class="text-muted">

                                    {{ $item->url }}

                                </small>

                            </td>

                            <td>
                                {{ $item->subtitle }}
                            </td>

                            <td>
                                {{ $item->sort_order }}
                            </td>
                            <td>

                                <div
                                    style="
            width:30px;
            height:30px;
            border-radius:50%;
            background:{{ $item->background_color }};
            border:1px solid #ddd;
        ">
                                </div>

                            </td>
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

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-4">

                                No data

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
    <div class="modal fade" id="createModal">

        <div class="modal-dialog modal-lg">

            <form action="{{ route('quick-links.store') }}" method="POST">

                @csrf

                <div class="modal-content">

                    <div class="modal-header">

                        <h4 class="modal-title">

                            Thêm Quick Link

                        </h4>

                        <button type="button" class="close" data-dismiss="modal">

                            <span>&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        @include('quick-link::admin.partials.form')

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
    <div class="modal fade" id="editModal">

        <div class="modal-dialog modal-lg">

            <form id="editForm" method="POST">

                @csrf
                @method('PUT')

                <div class="modal-content">

                    <div class="modal-header bg-warning">

                        <h4 class="modal-title">
                            Chỉnh sửa Quick Link
                        </h4>

                        <button type="button" class="close" data-dismiss="modal">

                            <span>&times;</span>

                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Title</label>

                            <input id="edit_title" type="text" name="title" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>Subtitle</label>

                            <input id="edit_subtitle" type="text" name="subtitle" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>URL</label>

                            <input id="edit_url" type="text" name="url" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>Background Color</label>

                            <input id="edit_background_color" type="color" name="background_color" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>Sort Order</label>

                            <input id="edit_sort_order" type="number" name="sort_order" class="form-control">

                        </div>

                        <div class="form-check">

                            <input id="edit_status" type="checkbox" name="status" value="1" class="form-check-input">

                            <label class="form-check-label">
                                Active
                            </label>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">

                            Hủy

                        </button>

                        <button type="submit" class="btn btn-warning">

                            Cập nhật

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>
    <div class="modal fade" id="deleteModal">

        <div class="modal-dialog">

            <form id="deleteForm" method="POST">

                @csrf
                @method('DELETE')

                <div class="modal-content">

                    <div class="modal-header bg-danger">

                        <h4 class="modal-title">

                            Xác nhận xóa

                        </h4>

                    </div>

                    <div class="modal-body">

                        Bạn có chắc muốn xóa

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
@endsection
@push('scripts')
    <script>
        $('.edit-btn').click(function() {

            let id = $(this).data('id');

            $.get(
                '/admin/quick-links/' + id,
                function(data) {

                    $('#edit_title').val(data.title);

                    $('#edit_subtitle').val(data.subtitle);

                    $('#edit_url').val(data.url);

                    $('#edit_background_color').val(
                        data.background_color
                    );

                    $('#edit_sort_order').val(
                        data.sort_order
                    );

                    $('#edit_status').prop(
                        'checked',
                        data.status == 1
                    );

                    $('#editForm').attr(
                        'action',
                        '/admin/quick-links/' + id
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
                '/admin/quick-links/' + id
            );

            $('#deleteModal').modal('show');

        });
    </script>
@endpush
