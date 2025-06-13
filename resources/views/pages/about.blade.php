@extends('layouts.app')

@section('content')

<!-- About Section -->
<section class="about-section section-padding">
    <div class="container">
        <!-- Title -->
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1>About Us</h1>
                <p class="lead">Transforming media into accessible content</p>
            </div>
        </div>

        <!-- About Content with Images -->
        <div class="row align-items-stretch">
            <!-- Left Column: 3 stacked images -->
            <div class="col-lg-6 col-12 d-flex flex-column justify-content-between" style="gap: 20px;">
                <img src="{{ asset('assets/images/topics/undraw_Group_video_re_btu7.png') }}" class="img-fluid rounded shadow-lg" alt="About our converter">
                <img src="{{ asset('assets/images/topics/undraw_Finance_re_gnv2.png') }}" class="img-fluid rounded shadow-lg" alt="About our converter">
                <img src="{{ asset('assets/images/topics/undraw_Redesign_feedback_re_jvm0.png') }}" class="img-fluid rounded shadow-lg" alt="About our converter">
            </div>

            <!-- Right Column: Text -->
            <div class="col-lg-6 col-12 d-flex flex-column justify-content-center">
                <div class="about-content ps-lg-5">
                    <h2 class="mb-4">Our Story</h2>
                    <p>Founded in 2023, our Video to Text Converter was born out of a need to make video content more accessible and usable...</p>

                    <div class="mission-vision mt-5">
                        <div class="d-flex mb-4">
                            <div class="me-4">
                                <i class="bi-bullseye feature-icon"></i>
                            </div>
                            <div>
                                <h3>Our Mission</h3>
                                <p>To bridge the gap between video content and text-based applications...</p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="me-4">
                                <i class="bi-eye feature-icon"></i>
                            </div>
                            <div>
                                <h3>Our Vision</h3>
                                <p>To become the leading platform for video content transformation...</p>
                            </div>
                        </div>
                    </div>

                    <div class="features-list mt-5">
                        <h3 class="mb-3">Why Choose Us?</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi-check-circle-fill text-primary me-2"></i> High accuracy speech-to-text conversion</li>
                            <li class="mb-2"><i class="bi-check-circle-fill text-primary me-2"></i> Support for multiple video platforms</li>
                            <li class="mb-2"><i class="bi-check-circle-fill text-primary me-2"></i> Fast processing with no queues</li>
                            <li class="mb-2"><i class="bi-check-circle-fill text-primary me-2"></i> Secure processing - your files are never stored</li>
                            <li class="mb-2"><i class="bi-check-circle-fill text-primary me-2"></i> Free basic service with premium upgrades</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="team-section">
                    <h2 class="text-center mb-5">Meet Our Team</h2>

                    <div class="row justify-content-center">
                        @php
                            $teamMembers = [
                                ['name' => 'Faseeh Hussain', 'role' => 'UX Designer'],
                                ['name' => 'Umer Sulehri', 'role' => 'Founder & Developer'],
                                ['name' => 'Noor-ul-Huda', 'role' => 'Analyst'],
                                ['name' => 'Jamal Khan', 'role' => 'AI Specialist'],
                            ];
                        @endphp

                        @foreach($teamMembers as $member)
                            <div class="col-lg-3 col-md-6 col-12 mb-4">
                                <div class="team-member text-center">
                                    <img src="{{ asset('assets/images/topics/undraw_Group_video_re_btu7.png') }}" class="rounded-circle mb-3" alt="{{ $member['name'] }}" width="120">
                                    <h4>{{ $member['name'] }}</h4>
                                    <p class="text-muted">{{ $member['role'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
