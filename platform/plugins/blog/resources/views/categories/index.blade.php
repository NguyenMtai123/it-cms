@extends('base::layouts.master')

@section('title', 'Categories')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-md-6">
            <h3 class="mb-0">Categories</h3>
        </div>

        <div class="col-md-6 text-right">
            <button class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#createCategoryModal">
                <i class="fas fa-plus"></i> Add Category
            </button>
        </div>
    </div>

    <div class="card card-outline card-primary">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th width="70">STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        {{-- <th>Description</th> --}}
                        <th>Parent</th>
                        <th width="100">Thứ tự</th>
                        <th>Status</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($categories as $c)
                        <tr>
                            <td>
                                {{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}
                            </td>

                            <td>
                                <strong>{{ $c->name }}</strong>
                            </td>

                            <td>
                                <code>{{ $c->slug }}</code>
                            </td>

                            {{-- <td>
                                {{ \Illuminate\Support\Str::limit($c->description, 60) }}
                            </td> --}}

                            <td>
                                {{ $c->parent?->name ?? '—' }}
                            </td>
                            <td>{{ $c->sort_order }}</td>

                            <td>
                                @if($c->status)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-secondary">Hidden</span>
                                @endif
                            </td>

                            <td>
                                <button class="btn btn-sm btn-warning"
                                        data-toggle="modal"
                                        data-target="#editCategoryModal{{ $c->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <button class="btn btn-sm btn-danger"
                                        data-toggle="modal"
                                        data-target="#deleteCategoryModal{{ $c->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        @include('blog::categories.partials.edit-modal', [
                            'category' => $c,
                            'categories' => $categoriesList
                        ])

                        @include('blog::categories.partials.delete-modal', [
                            'category' => $c
                        ])

                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                No categories found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            <div class="float-right">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

@include('blog::categories.partials.create-modal', [
    'categories' => $categoriesList
])
@endsection
