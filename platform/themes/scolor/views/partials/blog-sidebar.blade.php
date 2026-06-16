<div class="card sidebar-card mb-4">
    <div class="card-body">

        <form action="{{ route('blog.index') }}" method="GET">

            <div class="input-group">

                <input
                    type="text"
                    name="keyword"
                    value="{{ request('keyword') }}"
                    class="form-control"
                    placeholder="Tìm kiếm bài viết">

                <button class="btn btn-outline-secondary">
                    <i class="bi bi-search"></i>
                </button>

            </div>

        </form>

    </div>
</div>
<div class="card sidebar-card mb-4">
    <div class="card-body">

        <h4 class="mb-3">
            Danh mục tin
        </h4>

        @foreach($categories as $category)

            <div class="mb-2">

                <a
                    href="{{ route('blog.category',$category->slug) }}"
                    class="text-dark">

                    {{ $category->name }}

                </a>

            </div>

        @endforeach

    </div>
</div>
<div class="card sidebar-card mb-4">
    <div class="card-body">

        <h4 class="mb-3">
            Bài viết nổi bật
        </h4>

        @foreach($featuredPosts as $item)

            <a
                href="{{ url('/blog/'.$item->slug) }}"
                class="d-flex gap-3 mb-3 text-decoration-none">

                <img
                    src="{{ asset('storage/' .$item->image) }}"
                    width="90"
                    height="60"
                    style="object-fit:cover;">

                <div>

                    <div class="fw-semibold text-dark clamp-2">

                        {{ $item->title }}

                    </div>

                </div>

            </a>

        @endforeach

    </div>
</div>
@if(isset($viewedPosts) && $viewedPosts->isNotEmpty())
<div class="card sidebar-card">

    <div class="card-body">

        <h4 class="mb-3">
            Bài viết đã xem
        </h4>

        @foreach($viewedPosts as $item)

            <a
                href="{{ url('/blog/'.$item->slug) }}"
                class="d-block mb-2 text-dark">

                {{ $item->title }}

            </a>

        @endforeach

    </div>

</div>

@endif
