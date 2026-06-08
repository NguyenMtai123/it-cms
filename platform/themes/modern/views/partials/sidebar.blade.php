<div class="sidebar-sticky" style="position: sticky; top: 24px;">
    <div class="card sidebar-card mb-4">
        <div class="card-body">
            <h5 class="section-title mb-3">Về hệ thống</h5>
            <p class="text-soft mb-0">
                CMS Laravel modular system cho khoa CNTT, hỗ trợ quản lý nội dung, media, phân quyền và mở rộng module.
            </p>
        </div>
    </div>

    <div class="card sidebar-card mb-4">
        <div class="card-body">
            <h5 class="section-title mb-3">Danh mục</h5>

            @if(isset($categories) && $categories->count())
                <div class="d-flex flex-wrap gap-2">
                    @foreach($categories as $category)
                        <a href="{{ url('/categories/' . $category->slug) }}" class="badge badge-soft rounded-pill px-3 py-2">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-soft mb-0">Chưa có danh mục.</p>
            @endif
        </div>
    </div>

    <div class="card sidebar-card mb-4">
        <div class="card-body">
            <h5 class="section-title mb-3">Bài viết nổi bật</h5>

            @if(isset($featuredPosts) && $featuredPosts->count())
                <div class="vstack gap-3">
                    @foreach($featuredPosts as $post)
                        <a href="{{ url('/blog/' . $post->slug) }}" class="d-flex gap-3 text-decoration-none">
                            <div class="flex-shrink-0" style="width:72px;height:72px;">
                                @if($post->image)
                                    <img src="{{ asset($post->image) }}" class="w-100 h-100 rounded-3" style="object-fit:cover;">
                                @else
                                    <div class="w-100 h-100 rounded-3 bg-light d-flex align-items-center justify-content-center text-muted">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold text-dark clamp-2">{{ $post->title }}</div>
                                <div class="small text-soft clamp-2">{{ $post->description }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-soft mb-0">Chưa có bài nổi bật.</p>
            @endif
        </div>
    </div>

    <div class="card sidebar-card">
        <div class="card-body">
            <h5 class="section-title mb-3">Thông báo mới</h5>

            @if(isset($announcements) && $announcements->count())
                <div class="vstack gap-3">
                    @foreach($announcements as $item)
                        <a href="{{ url('/announcements/' . $item->slug) }}" class="text-decoration-none">
                            <div class="fw-semibold text-dark clamp-2">{{ $item->title }}</div>
                            <div class="small text-soft clamp-2">{{ $item->description }}</div>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-soft mb-0">Chưa có thông báo.</p>
            @endif
        </div>
    </div>
</div>
