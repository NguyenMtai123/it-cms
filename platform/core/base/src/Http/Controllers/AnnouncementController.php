<?php

namespace Platform\Core\Base\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Platform\Core\Base\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->paginate(10);

        return view('base::announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('base::announcements.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);
        $status = $request->boolean('status');
        $publishedAt = null;

        if (!empty($data['published_at'])) {

            $publishedAt = Carbon::parse($data['published_at']);

            // Nếu chọn ngày trong tương lai => chuyển về draft
            if ($publishedAt->isFuture()) {
                $status = 0;
            }
        } elseif ($status) {

            // Publish ngay
            $publishedAt = now();
        }
        Announcement::create([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']) . '-' . time(),
            'description' => $data['description'] ?? null,
            'content' => $data['content'] ?? null,
            'image' => $data['image'] ?? null,
            'status' => $status,
            'published_at' => $publishedAt,
        ]);

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Tạo thông báo thành công');
    }

    public function edit(int $id)
    {
        $announcement = Announcement::findOrFail($id);

        return view('base::announcements.edit', compact('announcement'));
    }


    public function update(Request $request, int $id)
    {
        $announcement = Announcement::findOrFail($id);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        $status = $request->boolean('status');
        $publishedAt = null;

        if (!empty($data['published_at'])) {

            $publishedAt = Carbon::parse($data['published_at']);

            // Nếu chọn ngày trong tương lai => chuyển về draft
            if ($publishedAt->isFuture()) {
                $status = 0;
            }
        } elseif ($status) {

            // Publish ngay
            $publishedAt = now();
        }
        $announcement->update([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']) . '-' . $announcement->id,
            'description' => $data['description'] ?? null,
            'content' => $data['content'] ?? null,
            'image' => $data['image'] ?? null,
            'status' => $status,
            'published_at' => $publishedAt,
        ]);

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Cập nhật thông báo thành công');
    }

    public function destroy(int $id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return back()->with('success', 'Xóa thông báo thành công');
    }
}
