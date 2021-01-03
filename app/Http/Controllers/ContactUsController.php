<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUsMail;
use App\Repositories\CompanyRepository;
use App\Repositories\LocalityRepository;
use App\Repositories\RegionRepository;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    private $companyRepository;
    private $reviewRepository;
    private $regionRepository;
    private $localityRepository;
    public function __construct()
    {
        $this->companyRepository = app(CompanyRepository::class);
        $this->reviewRepository  = app(ReviewRepository::class);
        $this->regionRepository  = app(RegionRepository::class);
        $this->localityRepository  = app(LocalityRepository::class);
    }

    public function create()
    {
        $last_items = $this->companyRepository->getCompanies(settings('count_popular_company', 4));
        $last_reviews = $this->reviewRepository->getReviews(settings('count_last_review', 3));
        $footer_regions    =   $this->regionRepository->getRegions(12);
        $footer_localities =   $this->localityRepository->getLocalities(12);
        $breadcrumbs = ['Contact us'=>['contact-us','']];
        return view('contact-us.create', compact('breadcrumbs', 'last_reviews', 'last_items', 'footer_regions','footer_localities'));
    }

    public function store(ContactUsRequest $request)
    {
        $data=$request->all();
        try{
            Mail::to(settings('admin_email'))->send(new ContactUsMail($data));
        }catch (\Swift_TransportException $e) {
            return redirect()->route('home' )
                ->with('message-success', 'Thank you for your message!');
        }
        return redirect()->route('home' )
            ->with('message-success', 'Thank you for your message!');

    }
}
