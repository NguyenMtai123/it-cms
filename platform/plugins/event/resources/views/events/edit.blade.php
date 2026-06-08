@extends('base::layouts.master')

@section('title', 'Edit Event')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Event</h3>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('events.update', $event->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}">
            </div>

            <div class="form-group mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Content</label>
                <textarea name="content" class="form-control" rows="6">{{ old('content', $event->content) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Location</label>
                <input type="text" name="location" class="form-control" value="{{ old('location', $event->location) }}">
            </div>

            <div class="form-group mb-3">
                <label>Start Date</label>
                <input type="datetime-local" name="start_date" class="form-control"
                       value="{{ old('start_date', optional($event->start_date)->format('Y-m-d\TH:i')) }}">
            </div>

            <div class="form-group mb-3">
                <label>End Date</label>
                <input type="datetime-local" name="end_date" class="form-control"
                       value="{{ old('end_date', optional($event->end_date)->format('Y-m-d\TH:i')) }}">
            </div>

            <div class="form-group mb-3">
                <label>
                    <input type="checkbox" name="status" value="1" {{ $event->status ? 'checked' : '' }}>
                    Published
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
