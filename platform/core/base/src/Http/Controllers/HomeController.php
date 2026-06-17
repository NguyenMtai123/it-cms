<?php

namespace Platform\Core\Base\Http\Controllers;

use Illuminate\Routing\Controller;
use Platform\Core\Base\Models\Announcement;
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
        /*
        |--------------------------------------------------------------------------
        | Banner
        |--------------------------------------------------------------------------
        */
        $sliders = collect();

        if (plugin_active('banner')) {
            $sliders = Banner::where('status', 1)
                ->orderBy('sort_order')
                ->take(5)
                ->get();
        }

        /*
        |--------------------------------------------------------------------------
        | Blog
        |--------------------------------------------------------------------------
        */
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

        /*
        |--------------------------------------------------------------------------
        | Announcement
        |--------------------------------------------------------------------------
        */
        $announcements = collect();

        if (plugin_active('announcement')) {
            $announcements = Announcement::where('is_active', 1)
                ->latest()
                ->take(3)
                ->get();
        }

        /*
        |--------------------------------------------------------------------------
        | Admission
        |--------------------------------------------------------------------------
        */
        $admissionSetting = null;
        $admissions = collect();

        if (plugin_active('admission')) {

            $admissionSetting = AdmissionSetting::first();

            $admissions = Admission::where('status', 1)
                ->orderBy('sort_order')
                ->get();
        }

        /*
        |--------------------------------------------------------------------------
        | Quick Links
        |--------------------------------------------------------------------------
        */
        $quickLinks = collect();

        if (plugin_active('quick-link')) {

            $quickLinks = QuickLink::where('status', 1)
                ->orderBy('sort_order')
                ->take(4)
                ->get();
        }

        /*
        |--------------------------------------------------------------------------
        | Projects
        |--------------------------------------------------------------------------
        */
        $projects = collect();

        if (plugin_active('project')) {

            $projects = Project::where('status', 1)
                ->orderBy('sort_order')
                ->get();
        }

        /*
        |--------------------------------------------------------------------------
        | Videos
        |--------------------------------------------------------------------------
        */
        $videos = collect();

        if (plugin_active('video')) {

            $videos = Video::where('status', 1)
                ->orderBy('sort_order')
                ->get();
        }

        /*
        |--------------------------------------------------------------------------
        | Sharing Category
        |--------------------------------------------------------------------------
        */
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

        /*
        |--------------------------------------------------------------------------
        | NTU Category
        |--------------------------------------------------------------------------
        */
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

        /*
        |--------------------------------------------------------------------------
        | About Link
        |--------------------------------------------------------------------------
        */
        $aboutLinks = collect();

        if (plugin_active('about-link')) {

            $aboutLinks = AboutLink::where('status', 1)
                ->orderBy('sort_order')
                ->get();
        }

        /*
        |--------------------------------------------------------------------------
        | Footer
        |--------------------------------------------------------------------------
        */
        $footerSetting = null;
        $organizationLinks = collect();
        $quickFooterLinks = collect();

        if (plugin_active('footer')) {

            $footerSetting = FooterSetting::first();

            $organizationLinks = FooterLink::where('group', 'organization')
                ->where('status', 1)
                ->orderBy('sort_order')
                ->get();

            $quickFooterLinks = FooterLink::where('group', 'quick')
                ->where('status', 1)
                ->orderBy('sort_order')
                ->get();
        }

        return view('theme::home', compact(
            'sliders',
            'featuredPosts',
            'latestPosts',
            'categories',
            'announcements',
            'admissionSetting',
            'admissions',
            'quickLinks',
            'projects',
            'videos',
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
