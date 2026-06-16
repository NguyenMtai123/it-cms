<?php

namespace Platform\Plugins\Footer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Plugins\Footer\Models\FooterLink;

class FooterLinkController extends Controller
{
    public function index()
    {
        $items = FooterLink::orderBy('group')
            ->orderBy('sort_order')
            ->paginate(10);

        return view(
            'footer::index',
            compact('items')
        );
    }

    public function store(Request $request)
    {
        FooterLink::create([

            'title' => $request->title,
            'url' => $request->url,
            'group' => $request->group,
            'sort_order' => $request->sort_order,
            'status' => $request->status,

        ]);

        return back();
    }

    public function update(
        Request $request,
        $id
    ) {

        FooterLink::findOrFail($id)
            ->update([

                'title' => $request->title,
                'url' => $request->url,
                'group' => $request->group,
                'sort_order' => $request->sort_order,
                'status' => $request->status,

            ]);

        return back();
    }

    public function destroy($id)
    {
        FooterLink::findOrFail($id)
            ->delete();

        return back();
    }
}
