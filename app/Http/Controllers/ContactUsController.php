<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUsMail;
use App\Repositories\CompanyRepository;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    private $companyRepository;
    private $reviewRepository;
    public function __construct()
    {
        $this->companyRepository = app(CompanyRepository::class);
        $this->reviewRepository  = app(ReviewRepository::class);
    }

    public function create()
    {
        $last_items = $this->companyRepository->getCompanies(settings('count_popular_company', 4));
        $last_reviews = $this->reviewRepository->getReviews(settings('count_last_review', 3));
        $breadcrumbs = ['Contact us'=>['contact-us','']];
        return view('contact-us.create', compact('breadcrumbs', 'last_reviews', 'last_items'));
    }

    public function store(ContactUsRequest $request)
    {
        $data=$request->all();
        Mail::to(settings('admin_email'))->send(new ContactUsMail($data));
        return redirect()->route('home' )
            ->with('message-success', 'Thank you for your message!');

    }
}
