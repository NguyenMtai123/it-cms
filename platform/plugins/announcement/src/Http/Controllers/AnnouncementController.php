<?php

namespace Platform\Plugins\Announcement\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Platform\Plugins\Announcement\Models\Announcement;
use Platform\Plugins\Announcement\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()
            ->paginate(10);

        return view(
            'announcement::announcements.index',
            compact('announcements')
        );
    }

    public function create()
    {
        return view(
            'announcement::announcements.create'
        );
    }

    public function store(
        AnnouncementRequest $request
    ) {

        Announcement::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),

            'summary' => $request->summary,

            'content' => $request->input('content'),
            'attachment' => $request->attachment,

            'publish_at' => $request->publish_at,

            'expired_at' => $request->expired_at,

            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('announcements.index')
            ->with(
                'success',
                'Tạo thông báo thành công'
            );
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);

        return view(
            'announcement::announcements.edit',
            compact('announcement')
        );
    }

    public function update(
        AnnouncementRequest $request,
        $id
    ) {

        $announcement = Announcement::findOrFail($id);

        $announcement->update([
            'title' => $request->title,

            'slug' => Str::slug($request->title),

            'summary' => $request->summary,

            'content' => $request->input('content'),
            'attachment' => $request->attachment,

            'publish_at' => $request->publish_at,

            'expired_at' => $request->expired_at,

            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('announcements.index')
            ->with(
                'success',
                'Cập nhật thành công'
            );
    }

    public function destroy($id)
    {
        Announcement::findOrFail($id)
            ->delete();

        return back()
            ->with(
                'success',
                'Đã xóa'
            );
    }
}
