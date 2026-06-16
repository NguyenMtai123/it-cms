<?php

namespace Platform\Plugins\AboutLink\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Plugins\AboutLink\Models\AboutLink;

class AboutLinkController extends Controller
{
    public function index()
    {
        $items = AboutLink::orderBy('sort_order')
            ->paginate(6);
        return view('about-link::index', compact('items'));
    }

    public function store(Request $request)
    {
        AboutLink::create($request->all());

        return redirect()
            ->route('about-link.index')
            ->with('success', 'Created successfully');
    }

    public function update(Request $request, $id)
    {
        $item = AboutLink::findOrFail($id);

        $item->update($request->all());

        return redirect()
            ->route('about-link.index')
            ->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        AboutLink::findOrFail($id)->delete();

        return back();
    }
}
