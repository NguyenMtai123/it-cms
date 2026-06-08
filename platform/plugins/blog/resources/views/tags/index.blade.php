@extends('base::layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- HEADER -->
        <div class="row mb-3">
            <div class="col-md-6">
                <h3>Tags Management</h3>
            </div>

            <div class="col-md-6 text-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#createTagModal">
                    <i class="fas fa-plus"></i> Add Tag
                </button>
            </div>
        </div>

        <!-- TABLE CARD -->
        <div class="card card-outline card-primary">

            <div class="card-body table-responsive p-0">

                <table class="table table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th width="160">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>
                                    {{ $loop->iteration + ($tags->currentPage() - 1) * $tags->perPage() }}
                                </td>
                                <td><b>{{ $tag->name }}</b></td>
                                <td><code>{{ $tag->slug }}</code></td>

                                <td>

                                    <!-- EDIT -->
                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#editTagModal{{ $tag->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#deleteTagModal{{ $tag->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </td>
                            </tr>
                            @include('blog::tags.partials.delete-modal', ['tag' => $tag])
                            <!-- EDIT MODAL -->
                            @include('blog::tags.partials.edit-modal', ['tag' => $tag])
                        @endforeach
                    </tbody>

                </table>

            </div>

            <div class="card-footer clearfix">
                <div class="float-right">
                    {{ $tags->links() }}
                </div>
            </div>

        </div>

    </div>

    <!-- CREATE MODAL -->
    @include('blog::tags.partials.create-modal')
@endsection
