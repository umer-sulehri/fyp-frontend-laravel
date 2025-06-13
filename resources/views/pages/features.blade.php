@extends('layouts.app')

@section('content')

<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-12">
                <h2 class="text-white">All Features</h2>
            </div>
        </div>
    </div>
</header>

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h3 class="mb-4">Popular Topics</h3>
            </div>

            <div class="col-lg-8 col-12 mt-3 mx-auto">
                <!-- Web Design -->
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                    <div class="d-flex">
                        <img src="{{ asset('assets/images/topics/undraw_Remote_design_team_re_urdx.png') }}" class="custom-block-image img-fluid" alt="Web Design">
                        <div class="custom-block-topics-listing-info d-flex">
                            <div>
                                <h5 class="mb-2">Web Design</h5>
                                <p class="mb-0">Topic Listing includes home, listing, detail and contact pages. Feel free to modify this template for your custom websites.</p>
                                <a href="" class="btn custom-btn mt-3 mt-lg-4">Learn More</a>
                            </div>
                            <span class="badge bg-design rounded-pill ms-auto">14</span>
                        </div>
                    </div>
                </div>

                <!-- Advertising -->
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                    <div class="d-flex">
                        <img src="{{ asset('assets/images/topics/undraw_online_ad_re_ol62.png') }}" class="custom-block-image img-fluid" alt="Advertising">
                        <div class="custom-block-topics-listing-info d-flex">
                            <div>
                                <h5 class="mb-2">Advertising</h5>
                                <p class="mb-0">Visit TemplateMo website to download free CSS templates. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="" class="btn custom-btn mt-3 mt-lg-4">Learn More</a>
                            </div>
                            <span class="badge bg-advertising rounded-pill ms-auto">30</span>
                        </div>
                    </div>
                </div>

                <!-- Podcast -->
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                    <div class="d-flex">
                        <img src="{{ asset('assets/images/topics/undraw_Podcast_audience_re_4i5q.png') }}" class="custom-block-image img-fluid" alt="Podcast">
                        <div class="custom-block-topics-listing-info d-flex">
                            <div>
                                <h5 class="mb-2">Podcast</h5>
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi necessitatibus.</p>
                                <a href="" class="btn custom-btn mt-3 mt-lg-4">Learn More</a>
                            </div>
                            <span class="badge bg-music rounded-pill ms-auto">20</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="col-lg-12 col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Trending Topics -->
<section class="section-padding section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <h3 class="mb-4">Trending Topics</h3>
            </div>

            <!-- Investment -->
            <div class="col-lg-6 col-md-6 col-12 mt-3 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    <a href="">
                        <div class="d-flex">
                            <div>
                                <h5 class="mb-2">Investment</h5>
                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                            </div>
                            <span class="badge bg-finance rounded-pill ms-auto">30</span>
                        </div>
                        <img src="{{ asset('assets/images/topics/undraw_Finance_re_gnv2.png') }}" class="custom-block-image img-fluid" alt="Investment">
                    </a>
                </div>
            </div>

            <!-- Finance -->
            <div class="col-lg-6 col-md-6 col-12 mt-lg-3">
                <div class="custom-block custom-block-overlay">
                    <div class="d-flex flex-column h-100">
                        <img src="{{ asset('assets/images/businesswoman-using-tablet-analysis.jpg') }}" class="custom-block-image img-fluid" alt="Finance">
                        <div class="custom-block-overlay-text d-flex">
                            <div>
                                <h5 class="text-white mb-2">Finance</h5>
                                <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint animi necessitatibus.</p>
                                <a href="" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                            </div>
                            <span class="badge bg-finance rounded-pill ms-auto">25</span>
                        </div>

                        <div class="social-share d-flex">
                            <p class="text-white me-4">Share:</p>
                            <ul class="social-icon">
                                <li><a href="#" class="social-icon-link bi-twitter"></a></li>
                                <li><a href="#" class="social-icon-link bi-facebook"></a></li>
                                <li><a href="#" class="social-icon-link bi-pinterest"></a></li>
                            </ul>
                            <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                        </div>

                        <div class="section-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
