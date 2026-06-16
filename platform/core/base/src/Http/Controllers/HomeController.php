<?php

namespace Platform\Core\Base\Http\Controllers;

use Illuminate\Routing\Controller;
use Platform\Core\Base\Models\Announcement;
use Platform\Packages\Page\Models\Page;
use Platform\Plugins\AboutLink\Models\AboutLink;
use Platform\Plugins\Admission\Models\Admission;
use Platform\Plugins\Admission\Models\AdmissionSetting;
use Platform\Plugins\Banner\Models\Banner;
use Platform\Plugins\Blog\Models\Category;
use Platform\Plugins\Blog\Models\Post;
use Platform\Plugins\Footer\Models\FooterLink;
use Platform\Plugins\Footer\Models\FooterSetting;
use Platform\Plugins\Project\Models\Project;
use Platform\Plugins\QuickLink\Models\QuickLink;
use Platform\Plugins\Video\Models\Video;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Banner::where('status', 1)
            ->orderBy('sort_order')
            ->take(5)
            ->get();

        $featuredPosts = Post::where('is_featured', 1)
            ->latest()
            ->take(5)
            ->get();

        $latestPosts = Post::where('status', 1)
            ->latest()
            ->take(4)
            ->get();

        $categories = Category::where('status', 1)
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->take(4)
            ->get();
        $announcements = Announcement::where('is_active', 1)
            ->latest()
            ->take(3)
            ->get();
        $admissionSetting =
            AdmissionSetting::first();

        $admissions =
            Admission::where('status', 1)
                ->orderBy('sort_order')
                ->get();

        $quickLinks = QuickLink::where('status', 1)
            ->orderBy('sort_order')
            ->take(4)
            ->get();
        $projects = Project::where('status', 1)
            ->orderBy('sort_order')
            ->get();

        $videos = Video::where('status', 1)
            ->orderBy('sort_order')
            ->get();

        $sharingCategory = Category::where('status', 1)
            ->whereNull('parent_id')
            ->where('sort_order', 5)
            ->first();

        $sharingPosts = collect();

        if ($sharingCategory) {

            $sharingPosts = $sharingCategory
                ->posts()
                ->where('status', 1)
                ->latest()
                ->take(3)
                ->get();
        }

        $ntuCategory = Category::where('status', 1)
            ->whereNull('parent_id')
            ->where('sort_order', 4)
            ->first();

        $ntuPosts = collect();

        if ($ntuCategory) {

            $ntuPosts = $ntuCategory
                ->posts()
                ->where('status', 1)
                ->latest()
                ->get();
        }

        $aboutLinks = AboutLink::where('status', 1)
            ->orderBy('sort_order')
            ->get();

        $footerSetting = FooterSetting::first();

        $organizationLinks = FooterLink::where('group', 'organization')
            ->where('status', 1)
            ->orderBy('sort_order')
            ->get();

        $quickFooterLinks = FooterLink::where('group', 'quick')
            ->where('status', 1)
            ->orderBy('sort_order')
            ->get();

        return view('theme::home', compact(
            'sliders',
            'featuredPosts',
            'quickLinks',
            'latestPosts',
            'categories',
            'announcements',
            'admissionSetting',
            'admissions',
            'videos',
            'projects',
            'sharingCategory',
            'sharingPosts',
            'ntuCategory',
            'ntuPosts',
            'aboutLinks',
            'footerSetting',
            'organizationLinks',
            'quickFooterLinks'
        ));
    }
}
