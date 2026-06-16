@extends('base::layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-8">
                <h2>Edit Menu: {{ $menu->name }}</h2>
            </div>
            <div class="col-md-4 text-right">
                <a href="{{ route('menus.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Menu Items</strong>
                    </div>

                    <div class="card-body">
                        <div id="menu-sortable" class="sortable-list">
                            @forelse($items as $item)
                                <div class="menu-row border rounded p-2 mb-2" data-id="{{ $item->id }}">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>{{ $item->label }}</strong>
                                            <span class="badge badge-info">Order: {{ $item->order }}</span>
                                            <div class="text-muted small">{{ $item->url }}</div>
                                        </div>

                                        <div>
                                            <a href="#" class="text-dark mr-2 edit-item-btn"
                                                data-id="{{ $item->id }}">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="#" class="text-dark delete-item-btn"
                                                data-id="{{ $item->id }}" data-label="{{ $item->label }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>

                                    @if ($item->children->count())
                                        <div class="mt-2 pl-3 border-left sortable-list children-list"
                                            data-parent-id="{{ $item->id }}">
                                            @foreach ($item->children as $child)
                                                <div class="menu-row border rounded p-2 mb-2 bg-light"
                                                    data-id="{{ $child->id }}">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <strong>- {{ $child->label }}</strong>
                                                            <small class="text-muted">({{ $child->url }})</small>
                                                            <span class="badge badge-secondary">Order:
                                                                {{ $child->order }}</span>
                                                        </div>

                                                        <div>
                                                            <a href="#" class="text-dark mr-2 edit-item-btn"
                                                                data-id="{{ $child->id }}">
                                                                <i class="fas fa-edit"></i>
                                                            </a>

                                                            <a href="#" class="text-dark delete-item-btn"
                                                                data-id="{{ $child->id }}"
                                                                data-label="{{ $child->label }}">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @empty
                                <p class="text-muted">Chưa có menu item nào.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Menu Item</strong>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('menus.items.store', $menu->id) }}">
                            @csrf

                            <div class="form-group">
                                <label>Label</label>
                                <input type="text" name="label" class="form-control">
                            </div>
                            <div class="form-group">

                                <label>Page</label>

                                <select name="page_id" class="form-control">

                                    <option value="">
                                        -- Custom URL --
                                    </option>

                                    @foreach ($pages as $page)
                                        <option value="{{ $page->id }}">

                                            {{ $page->title }}

                                        </option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="form-group">

                                <label>URL</label>

                                <input type="text" name="url" class="form-control" placeholder="/lien-he">

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Parent</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="">-- Root --</option>
                                        @foreach ($items as $item)
                                            <option value="{{ $item->id }}">{{ $item->label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Order</label>
                                    <input type="number" name="order" class="form-control" value="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Open new tab</label>
                                <input type="checkbox" name="target_blank" value="1">
                            </div>

                            <button class="btn btn-primary btn-block">
                                Save Item
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteItemModal">

        <div class="modal-dialog">

            <form id="deleteItemForm" method="POST">

                @csrf
                @method('DELETE')

                <div class="modal-content">

                    <div class="modal-header bg-danger text-white">

                        <h5>Xóa Menu Item</h5>

                    </div>

                    <div class="modal-body">

                        Bạn có chắc muốn xóa:

                        <strong id="deleteLabel"></strong>

                        ?

                        <br><br>

                        <span class="text-danger">
                            Tất cả menu con cũng sẽ bị xóa.
                        </span>

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
    <div class="modal fade" id="editItemModal">

        <div class="modal-dialog">

            <form id="editItemForm" method="POST">

                @csrf
                @method('PUT')

                <div class="modal-content">

                    <div class="modal-header">
                        <h5>Edit Menu Item</h5>
                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label>Label</label>

                            <input type="text" id="edit_label" name="label" class="form-control">

                        </div>
                        <div class="form-group">

                            <label>Page</label>

                            <select id="edit_page_id" name="page_id" class="form-control">

                                <option value="">
                                    -- Custom URL --
                                </option>

                                @foreach ($pages as $page)
                                    <option value="{{ $page->id }}">
                                        {{ $page->title }}
                                    </option>
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group">

                            <label>URL</label>

                            <input type="text" id="edit_url" name="url" class="form-control">

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Order</label>

                                <input type="number" id="edit_order" name="order" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Parent</label>

                                <select id="edit_parent_id" name="parent_id" class="form-control">

                                    <option value="">
                                        -- Root --
                                    </option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="custom-control custom-checkbox">

                                <input type="checkbox" id="edit_target_blank" name="target_blank" value="1"
                                    class="custom-control-input">

                                <label class="custom-control-label" for="edit_target_blank">

                                    Open in new tab

                                </label>

                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cancel
                        </button>

                        <button class="btn btn-primary">
                            Save
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>
@endsection
@push('scripts')
    <script>
        $(function() {

            $('.edit-item-btn').click(function(e) {
                e.preventDefault();

                let id = $(this).data('id');

                $.get('/admin/menus/menus/items/' + id + '/edit', function(res) {

                    let item = res.item;

                    $('#edit_label').val(item.label);
                    $('#edit_url').val(item.url);
                    $('#edit_order').val(item.order);

                    $('#edit_target_blank').prop(
                        'checked',
                        item.target_blank == 1
                    );

                    let html = `
        <option value="">
            -- Root --
        </option>
    `;

                    res.parents.forEach(function(parent) {

                        html += `
            <option value="${parent.id}">
                ${parent.label}
            </option>
        `;

                    });

                    $('#edit_parent_id').html(html);

                    $('#edit_parent_id').val(item.parent_id);
                    $('#edit_page_id').val(item.page_id);

                    $('#editItemForm').attr(
                        'action',
                        '/admin/menus/menus/items/' + id
                    );

                    $('#editItemModal').modal('show');
                });
            });

            $('.delete-item-btn').click(function(e) {
                e.preventDefault();

                let id = $(this).data('id');
                let label = $(this).data('label');

                $('#deleteLabel').text(label);

                $('#deleteItemForm').attr(
                    'action',
                    '/admin/menus/menus/items/' + id
                );

                $('#deleteItemModal').modal('show');
            });

        });
    </script>
    {{-- <script>
        document.querySelectorAll('.sortable-list').forEach(function(el) {
            new Sortable(el, {
                group: 'menu-items',
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,
                handle: false,
                onEnd: function() {
                    saveMenuOrder();
                }
            });
        });

        function saveMenuOrder() {
            let items = [];

            $('#menu-sortable > .menu-row').each(function(index) {
                let parentId = $(this).data('id');

                // item cha
                items.push({
                    id: parentId,
                    parent_id: null,
                    order: index + 1
                });

                // item con
                $(this).find('> .children-list > .menu-row').each(function(childIndex) {
                    items.push({
                        id: $(this).data('id'),
                        parent_id: parentId,
                        order: childIndex + 1
                    });
                });
            });

            $.ajax({
                url: '/admin/menus/update-order',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    items: items
                },
                success: function() {
                    location.reload();
                }
            });
        }
    </script> --}}
@endpush
