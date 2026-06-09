<?php

namespace Platform\Plugins\Banner\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Plugins\Banner\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->paginate(10);

        return view(
            'banner::banners.index',
            compact('banners')
        );
    }

    public function create()
    {
        return view('banner::banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required'
        ]);

        Banner::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image, // 🔥 URL từ media picker
            'link' => $request->link,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.banner.index');
    }

    public function edit($id) // Đổi từ (Banner $banner) thành ($id)
    {
        // Tìm chính xác bản ghi từ bảng banners, không tìm thấy sẽ báo lỗi 404
        $banner = Banner::findOrFail($id);

        return view(
            'banner::banners.edit',
            compact('banner')
        );
    }

    public function update(Request $request, $id) // Đổi từ (..., Banner $banner) thành (..., $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'image' => 'required'
        ]);

        // Xử lý logic đồng bộ ảnh từ x-media-picker hoặc file upload
        $imagePath = $banner->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('banners', 'public');
        } elseif ($request->filled('image')) {
            $imagePath = $request->image; // Nhận text URL từ media-picker
        }

        $banner->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'link' => $request->link,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.banner.index')
            ->with('success', 'Cập nhật banner thành công');
    }

    public function destroy($id) // Đổi từ (Banner $banner) thành ($id)
    {
        // Tìm chính xác banner theo ID, nếu không thấy trả về lỗi 404
        $banner = Banner::findOrFail($id);

        // Thực hiện xóa khỏi cơ sở dữ liệu
        $banner->delete();

        // Quay lại trang danh sách kèm thông báo thành công
        return redirect()->route('admin.banner.index')
            ->with('success', 'Xóa banner thành công!');
    }

}
