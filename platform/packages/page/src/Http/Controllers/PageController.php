<?php

namespace Platform\Packages\Page\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Packages\Page\Models\Page;
use Platform\Packages\Slug\Support\SlugHelper;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(10);

        return view('page::admin.index', compact('pages'));
    }

    public function create()
    {
        $pages = Page::orderBy('title')->get();

        return view('page::admin.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'file' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'parent_id' => ['nullable', 'exists:pages,id'],
        ]);

        $status = $request->boolean('status');
        $publishedAt = null;

        if (!empty($data['published_at'])) {
            $publishedAt = Carbon::parse($data['published_at']);

            if ($publishedAt->isFuture()) {
                $status = 0;
            }
        } elseif ($status) {
            $publishedAt = now();
        }

        $slug = !empty($data['slug'])
            ? SlugHelper::make($data['slug'], Page::class)
            : SlugHelper::make($data['title'], Page::class);

        Page::create([
            'title' => $data['title'],
            'slug' => $slug,
            'excerpt' => $data['excerpt'] ?? null,
            'content' => $data['content'] ?? null,
            'image' => $data['image'] ?? null,
            'file' => $data['file'] ?? null,
            'status' => $status,
            'parent_id' => $data['parent_id'] ?? null,
            'published_at' => $publishedAt,
        ]);

        return redirect()
            ->route('pages.index')
            ->with('success', 'Tạo page thành công');
    }

    public function edit(int $id)
    {
        $page = Page::findOrFail($id);

        $pages = Page::where('id', '!=', $id)
            ->orderBy('title')
            ->get();

        return view(
            'page::admin.edit',
            compact('page', 'pages')
        );
    }

    public function update(Request $request, int $id)
    {
        $page = Page::findOrFail($id);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'file' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'parent_id' => ['nullable', 'exists:pages,id'],
        ]);

        $status = $request->boolean('status');
        $publishedAt = null;

        if (!empty($data['published_at'])) {
            $publishedAt = Carbon::parse($data['published_at']);

            if ($publishedAt->isFuture()) {
                $status = 0;
            }
        } elseif ($status) {
            $publishedAt = now();
        }

        $slugSource = !empty($data['slug']) ? $data['slug'] : $data['title'];

        $page->update([
            'title' => $data['title'],
            'slug' => SlugHelper::make($slugSource, Page::class, $page->id),
            'excerpt' => $data['excerpt'] ?? null,
            'content' => $data['content'] ?? null,
            'image' => $data['image'] ?? null,
            'file' => $data['file'] ?? null,
            'parent_id' => $data['parent_id'] ?? null,
            'status' => $status,
            'published_at' => $publishedAt,
        ]);

        return redirect()
            ->route('pages.index')
            ->with('success', 'Cập nhật page thành công');
    }

    public function destroy(int $id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return back()->with('success', 'Xóa page thành công');
    }
}
