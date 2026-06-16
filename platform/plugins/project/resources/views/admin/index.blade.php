@extends('base::layouts.master')

@section('title', 'Projects')

@section('page-header')

    <div class="d-flex justify-content-between">

        <h1>Projects</h1>

        <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">

            <i class="fas fa-plus"></i>
            Create

        </button>

    </div>

@endsection

@section('content')
    <div class="card">

        <div class="card-body p-0">

            <table class="table table-hover">

                <thead>

                    <tr>

                        <th width="80" class="text-center">STT</th>
                        <th>Logo</th>

                        <th>Name</th>

                        <th>Order</th>

                        <th>Status</th>

                        <th width="150"></th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($items as $item)
                        <tr>

                            <td class="text-center">

                                {{ ($items->currentPage() - 1) * $items->perPage() + $loop->iteration }}

                            </td>

                            <td>

                                @if ($item->logo)
                                    <img src="{{ asset('storage/' .$item->logo) }}" width="70">
                                @endif

                            </td>

                            <td>

                                {{ $item->name }}

                            </td>

                            <td>

                                {{ $item->sort_order }}

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

                                <a href="{{ route('projects.edit', $item->id) }}" class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>
                                <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $item->id }}"
                                    data-name="{{ $item->name }}">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>
            <div class="d-flex justify-content-center py-3">

                {{ $items->links() }}

            </div>
        </div>

    </div>
    <div class="modal fade" id="createModal">

        <div class="modal-dialog">

            <form action="{{ route('projects.store') }}" method="POST">

                @csrf

                <div class="modal-content">

                    <div class="modal-header">

                        <h4>Create Project</h4>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Name</label>

                            <input type="text" name="name" class="form-control">

                        </div>

                        <div class="form-group">

                            <label>Logo</label>

                            <x-media-picker name="logo" />
                        </div>

                        <div class="form-group">

                            <label>URL</label>

                            <input type="text" name="url" class="form-control">
                        </div>

                        <div class="form-group">

                            <label>Order</label>

                            <input type="number" name="sort_order" value="0" class="form-control">
                        </div>

                        <div class="form-check">

                            <input type="checkbox" name="status" checked>

                            Active

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
    <div class="modal fade" id="deleteModal">

        <div class="modal-dialog">

            <form id="deleteForm" method="POST">

                @csrf
                @method('DELETE')

                <div class="modal-content">

                    <div class="modal-header bg-danger">

                        <h4>
                            Delete Project
                        </h4>

                    </div>

                    <div class="modal-body">

                        Bạn có chắc muốn xóa:

                        <strong id="deleteName"></strong>

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
        $('.delete-btn').click(function() {

            let id = $(this).data('id');

            $('#deleteName')
                .text($(this).data('name'));

            $('#deleteForm').attr(
                'action',
                '/admin/projects/' + id
            );

            $('#deleteModal')
                .modal('show');
        });
    </script>
@endpush
