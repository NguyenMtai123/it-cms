@extends('base::layouts.master')

@section('content')

<h1>Edit Menu: {{ $menu->name }}</h1>

{{-- ADD ITEM FORM --}}
<div class="card mb-3">
    <div class="card-body">

        <form method="POST" action="{{ route('menus.items.store', $menu->id) }}">
            @csrf

            <input name="label" placeholder="Label" class="form-control mb-2">

            <input name="url" placeholder="URL" class="form-control mb-2">

            <button class="btn btn-success">Add Item</button>
        </form>

    </div>
</div>

{{-- LIST ITEMS --}}
<div class="card">
    <div class="card-body">

        <ul class="list-group">

            @foreach($items as $item)
                <li class="list-group-item d-flex justify-content-between">
                    <span>{{ $item->label }}</span>
                    <small>{{ $item->url }}</small>
                </li>
            @endforeach

        </ul>

    </div>
</div>

@endsection
