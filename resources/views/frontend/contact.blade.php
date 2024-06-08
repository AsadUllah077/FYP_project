@extends('frontend.layouts.master')
@section('content')
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url({{ asset('frontend/images/bg/bg1.jpg') }});">
    <div class="section-shape section-shape1 top-inherit bottom-0"
        style="background-image: url({{ asset('frontend/images/shape8.png') }});">
    </div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">Contact</h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay">
    </div>
</section>
<div class="section-title mb-6 w-50 mx-auto text-center">
    <h4 class="mb-1">
        <span class="mr-4">20MDSWE122</span>
        <span class="mr-4">Muhammad Hanif</span>
        <span class="mr-4">03433087542</span> 
    </h4>
    <h4 class="mb-1">
        <span class="mr-5">20MDSWE107</span>
        <span class="mr-5">Asad Ullah</span>
        <span class="mr-5">03189051077</span> 
    </h4>
    <h4 class="mb-1">
        <span class="mr-5">20MDSWE123</span>
        <span class="mr-5">Hilal Akhtar</span>
        <span class="mr-5">03416999296</span> 
    </h4>
      
</div>


@endsection
