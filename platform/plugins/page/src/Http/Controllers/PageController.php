<?php

namespace Platform\Plugins\Page\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Platform\Plugins\Page\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(10);

        return view(
            'page::pages.index',
            compact('pages')
        );
    }

    public function create()
    {
        return view('page::pages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
        ]);

        Page::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'description' => $data['description'] ?? null,
            'content' => $data['content'] ?? null,
            'image' => $data['image'] ?? null,
            'status' => $request->boolean('status'),
        ]);

        return redirect()
            ->route('pages.index')
            ->with('success', 'Tạo trang thành công');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view(
            'page::pages.edit',
            compact('page')
        );
    }
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $data = $request->validate([
            'name' => ['required'],
            'description' => ['nullable'],
            'content' => ['nullable'],
            'image' => ['nullable'],
        ]);

        $page->update([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'description' => $data['description'],
            'content' => $data['content'],
            'image' => $data['image'],
            'status' => $request->boolean('status'),
        ]);

        return redirect()
            ->route('pages.index')
            ->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);

        $page->delete();

        return back()
            ->with('success', 'Đã xóa');
    }
}
