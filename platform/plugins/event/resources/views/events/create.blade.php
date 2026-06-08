@extends('base::layouts.master')

@section('title', 'Create Event')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Event</h3>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('events.store') }}">
            @csrf

            <div class="form-group mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            </div>

            <div class="form-group mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Content</label>
                <textarea name="content" class="form-control" rows="6">{{ old('content') }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Location</label>
                <input type="text" name="location" class="form-control" value="{{ old('location') }}">
            </div>

           <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Start Date</label>
                        <input type="datetime-local" name="start_date" class="form-control" value="{{ old('start_date') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>End Date</label>
                        <input type="datetime-local" name="end_date" class="form-control" value="{{ old('end_date') }}">
                    </div>
                </div>
           </div>

            <div class="form-group mb-3">
                <label>
                    <input type="checkbox" name="status" value="1" checked>
                    Published
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
