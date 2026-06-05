<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Career;
use App\Models\ContactMessage;
use App\Models\JobApplication;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Outlet;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    private function getPageData(string $slug)
    {
        $page = Page::with('sections')->where('slug', $slug)->firstOrFail();
        $sections = $page->sections->pluck('value', 'key')->all();
        return compact('page', 'sections');
    }

    public function home()
    {
        $data = $this->getPageData('home');
        $data['featuredMenuItems'] = MenuItem::with('category')->where('is_featured', true)->where('is_active', true)->take(4)->get();
        $data['outlets'] = Outlet::where('is_active', true)->orderBy('sort_order')->take(3)->get();
        $data['heroBanner'] = Banner::where('is_active', true)->where('location', 'home')->orderBy('sort_order')->first();
        return view('home', $data);
    }

    public function about()
    {
        return view('about', $this->getPageData('about'));
    }

    public function outletIndex()
    {
        $data = $this->getPageData('outlet');
        $data['outlets'] = Outlet::where('is_active', true)->orderBy('sort_order')->get();
        return view('outlet.index', $data);
    }

    public function outletShow(string $slug)
    {
        $outlet = Outlet::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $menuCategories = MenuCategory::with(['menuItems' => function ($q) use ($outlet) {
            $q->where('is_active', true)
              ->with(['outlets' => function ($q2) use ($outlet) {
                  $q2->where('outlet_id', $outlet->id);
              }]);
        }])->where('is_active', true)->get();

        return view('outlet.show', compact('outlet', 'menuCategories'));
    }

    public function menu()
    {
        $data = $this->getPageData('menu');
        $data['menuCategories'] = MenuCategory::with(['menuItems' => function ($q) {
            $q->where('is_active', true);
        }])->where('is_active', true)->orderBy('sort_order')->get();
        return view('menu', $data);
    }

    public function careers()
    {
        $data = $this->getPageData('careers');
        $data['careers'] = Career::where('is_active', true)->orderBy('created_at', 'desc')->get();
        return view('careers', $data);
    }

    public function contact()
    {
        return view('contact', $this->getPageData('contact'));
    }

    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Pesan Anda telah berhasil dikirim! Terima kasih telah menghubungi kami.');
    }

    public function careerApply(Request $request, Career $career)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'cover_letter' => 'nullable|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $application = JobApplication::create([
            'career_id' => $career->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'cover_letter' => $validated['cover_letter'],
        ]);

        if ($request->hasFile('resume')) {
            $application->addMediaFromRequest('resume')->toMediaCollection('resume');
        }

        return back()->with('success', 'Lamaran Anda telah berhasil dikirim! Tim HRD kami akan segera meninjau berkas Anda.');
    }
}
