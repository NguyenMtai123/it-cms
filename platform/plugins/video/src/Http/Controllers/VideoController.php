<?php

namespace Platform\Plugins\Video\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Plugins\Video\Models\Video;

class VideoController extends Controller
{
    private function convertYoutubeUrl(string $url): string
    {
        // Đã là embed
        if (str_contains($url, '/embed/')) {
            return $url;
        }

        // youtube.com/watch?v=
        if (preg_match('/[?&]v=([^&]+)/', $url, $matches)) {

            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        // youtu.be/
        if (preg_match('/youtu\.be\/([^?&]+)/', $url, $matches)) {

            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        return $url;
    }
    public function index()
    {
        $videos = Video::orderBy('sort_order')
            ->paginate(10);

        return view(
            'video::index',
            compact('videos')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'embed_url' => 'required',
        ]);

        Video::create([

            'title' => $request->title,

            'embed_url' => $this->convertYoutubeUrl(
                $request->embed_url
            ),

            'description' => $request->description,

            'sort_order' => $request->sort_order ?? 0,

            'status' => $request->status ? 1 : 0,

        ]);

        return back()
            ->with('success', 'Created successfully');
    }

    public function update(
        Request $request,
        Video $video
    ) {

        $video->update([

            'title' => $request->title,

            'embed_url' => $this->convertYoutubeUrl(
                $request->embed_url
            ),

            'description' => $request->description,

            'sort_order' => $request->sort_order ?? 0,

            'status' => $request->status ? 1 : 0,

        ]);

        return back()
            ->with('success', 'Updated successfully');
    }
    public function destroy(Video $video)
    {
        $video->delete();

        return back()
            ->with('success', 'Deleted successfully');
    }
}
