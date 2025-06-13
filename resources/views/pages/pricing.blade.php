@extends('layouts.app')

@section('content')


<!-- Pricing Header Section -->
<section class="hero-section d-flex justify-content-center align-items-center" id="section_1" style="background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);">
                    <center>
                        <h3 class="text-white">Choose the perfect plan for your video transcription.</h3>
                    </center>
            </section>

            <!-- Pricing Plans Section -->
            <section class="section-padding" id="pricing">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg">
                                <div class="pricing-header">
                                    <h5 class="mb-3">Basic</h5>
                                    <h2 class="mb-3">$9.99<span>/month</span></h2>
                                    <p class="text-muted">Perfect for individuals</p>
                                </div>
                                
                                <div class="pricing-features">
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="bi-check-circle-fill text-success me-2"></i> 10 video conversions/month</li>
                                        <li class="mb-2"><i class="bi-check-circle-fill text-success me-2"></i> 30 min max video length</li>
                                        <li class="mb-2"><i class="bi-check-circle-fill text-success me-2"></i> Basic text transcription</li>
                                        <li class="mb-2"><i class="bi-x-circle-fill text-secondary me-2"></i> No audio extraction</li>
                                        <li class="mb-2"><i class="bi-x-circle-fill text-secondary me-2"></i> No keyword extraction</li>
                                        <li class="mb-2"><i class="bi-x-circle-fill text-secondary me-2"></i> No priority support</li>
                                    </ul>
                                </div>
                                
                                <div class="pricing-footer mt-auto">
                                    <a href="#" class="btn custom-btn custom-border-btn w-100">Get Started</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg" style="border: 3px solid #80d0c7;">
                                <div class="pricing-header position-relative">
                                    <span class="badge bg-primary position-absolute top-0 end-0">Popular</span>
                                    <h5 class="mb-3">Pro</h5>
                                    <h2 class="mb-3">$19.99<span>/month</span></h2>
                                    <p class="text-muted">Best for professionals</p>
                                </div>
                                
                                <div class="pricing-features">
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="bi-check-circle-fill text-success me-2"></i> 50 video conversions/month</li>
                                        <li class="mb-2"><i class="bi-check-circle-fill text-success me-2"></i> 2 hour max video length</li>
                                        <li class="mb-2"><i class="bi-check-circle-fill text-success me-2"></i> Advanced text transcription</li>
                                        <li class="mb-2"><i class="bi-check-circle-fill text-success me-2"></i> Audio extraction (MP3)</li>
                                        <li class="mb-2"><i class="bi-check-circle-fill text-success me-2"></i> Keyword extraction</li>
                                        <li class="mb-2"><i class="bi-x-circle-fill text-secondary me-2"></i> Standard support</li>
                                    </ul>
                                </div>
                                
                                <div class="pricing-footer mt-auto">
                                    <a href="#" class="btn custom-btn w-100">Get Started</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="custom-block bg-white shadow-lg">
                                <div class="pricing-header">
                                    <h5 class="mb-3">Enterprise</h5>
                                    <h2 class="mb-3">$49.99<span>/month</span></h2>
                                    <p class="text-muted">For teams & businesses</p>
                                </div>
                                
                                <div class="pricing-features">
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="bi-check-circle-fill text-success me-2"></i> Unlimited conversions</li>
                                        <li class="mb-2"><i class="bi-check-circle-fill text-success me-2"></i> 4 hour max video length</li>
                                        <li class="mb-2"><i class="bi-check-circle-fill text-success me-2"></i> Premium transcription</li>
                                        <li class="mb-2"><i class="bi-check-circle-fill text-success me-2"></i> Audio extraction (MP3/WAV)</li>
                                        <li class="mb-2"><i class="bi-check-circle-fill text-success me-2"></i> Keyword & summary generation</li>
                                        <li class="mb-2"><i class="bi-check-circle-fill text-success me-2"></i> Priority 24/7 support</li>
                                    </ul>
                                </div>
                                
                                <div class="pricing-footer mt-auto">
                                    <a href="#" class="btn custom-btn custom-border-btn w-100">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <p class="mb-4">Not sure which plan is right for you? <a href="#section_5" class="click-scroll">Contact our team</a></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Feature Comparison Section -->
            <section class="section-padding section-bg" id="section_3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mb-5">
                            <h2 class="mb-3">Feature Comparison</h2>
                            <p>See how our plans stack up against each other</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th style="width: 30%">Feature</th>
                                            <th class="text-center">Basic</th>
                                            <th class="text-center">Pro</th>
                                            <th class="text-center">Enterprise</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Monthly Conversions</td>
                                            <td class="text-center">10</td>
                                            <td class="text-center">50</td>
                                            <td class="text-center">Unlimited</td>
                                        </tr>
                                        <tr>
                                            <td>Max Video Length</td>
                                            <td class="text-center">30 min</td>
                                            <td class="text-center">2 hours</td>
                                            <td class="text-center">4 hours</td>
                                        </tr>
                                        <tr>
                                            <td>Transcription Accuracy</td>
                                            <td class="text-center">90%</td>
                                            <td class="text-center">95%</td>
                                            <td class="text-center">98%+</td>
                                        </tr>
                                        <tr>
                                            <td>Audio Extraction</td>
                                            <td class="text-center"><i class="bi-x text-danger"></i></td>
                                            <td class="text-center">MP3</td>
                                            <td class="text-center">MP3/WAV</td>
                                        </tr>
                                        <tr>
                                            <td>Keyword Extraction</td>
                                            <td class="text-center"><i class="bi-x text-danger"></i></td>
                                            <td class="text-center"><i class="bi-check text-success"></i></td>
                                            <td class="text-center"><i class="bi-check text-success"></i></td>
                                        </tr>
                                        <tr>
                                            <td>Video Summary</td>
                                            <td class="text-center"><i class="bi-x text-danger"></i></td>
                                            <td class="text-center"><i class="bi-check text-success"></i></td>
                                            <td class="text-center"><i class="bi-check text-success"></i></td>
                                        </tr>
                                        <tr>
                                            <td>Priority Support</td>
                                            <td class="text-center"><i class="bi-x text-danger"></i></td>
                                            <td class="text-center"><i class="bi-check text-success"></i></td>
                                            <td class="text-center">24/7</td>
                                        </tr>
                                        <tr>
                                            <td>Team Collaboration</td>
                                            <td class="text-center"><i class="bi-x text-danger"></i></td>
                                            <td class="text-center"><i class="bi-x text-danger"></i></td>
                                            <td class="text-center"><i class="bi-check text-success"></i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimonials Section -->
            <section class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mb-5">
                            <h2 class="mb-3">What Our Customers Say</h2>
                            <p>Trusted by professionals worldwide</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg">
                                <div class="d-flex mb-3">
                                    <img src="images/topics/colleagues-working-cozy-office-medium-shot.png" class="img-fluid rounded-circle me-3" style="width: 60px; height: 60px;" alt="Customer">
                                    <div>
                                        <h6 class="mb-1">Sarah Johnson</h6>
                                        <p class="text-muted small">Content Creator</p>
                                    </div>
                                </div>
                                <p>"The Pro plan has transformed my workflow. I can now transcribe all my YouTube videos in minutes!"</p>
                                <div class="rating">
                                    <i class="bi-star-fill text-warning"></i>
                                    <i class="bi-star-fill text-warning"></i>
                                    <i class="bi-star-fill text-warning"></i>
                                    <i class="bi-star-fill text-warning"></i>
                                    <i class="bi-star-fill text-warning"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg">
                                <div class="d-flex mb-3">
                                    <img src="images/topics/undraw_Finance_re_gnv2.png" class="img-fluid rounded-circle me-3" style="width: 60px; height: 60px;" alt="Customer">
                                    <div>
                                        <h6 class="mb-1">Michael Chen</h6>
                                        <p class="text-muted small">Marketing Director</p>
                                    </div>
                                </div>
                                <p>"Our team uses the Enterprise plan to transcribe client meetings. The accuracy is impressive and saves us hours."</p>
                                <div class="rating">
                                    <i class="bi-star-fill text-warning"></i>
                                    <i class="bi-star-fill text-warning"></i>
                                    <i class="bi-star-fill text-warning"></i>
                                    <i class="bi-star-fill text-warning"></i>
                                    <i class="bi-star-fill text-warning"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="custom-block bg-white shadow-lg">
                                <div class="d-flex mb-3">
                                    <img src="images/topics/undraw_Group_video_re_btu7.png" class="img-fluid rounded-circle me-3" style="width: 60px; height: 60px;" alt="Customer">
                                    <div>
                                        <h6 class="mb-1">David Wilson</h6>
                                        <p class="text-muted small">Podcast Host</p>
                                    </div>
                                </div>
                                <p>"The audio extraction feature alone is worth the price. I use it to create show notes from my podcast episodes."</p>
                                <div class="rating">
                                    <i class="bi-star-fill text-warning"></i>
                                    <i class="bi-star-fill text-warning"></i>
                                    <i class="bi-star-fill text-warning"></i>
                                    <i class="bi-star-fill text-warning"></i>
                                    <i class="bi-star-half text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FAQ Section -->
            <section class="faq-section section-padding section-bg" id="section_4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h2 class="mb-4">Pricing FAQs</h2>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-lg-5 col-12">
                            <img src="images/faq_graphic.jpg" class="img-fluid" alt="FAQs">
                        </div>

                        <div class="col-lg-6 col-12 m-auto">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Can I change plans later?
                                        </button>
                                    </h2>

                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Yes! You can upgrade or downgrade your plan at any time. Changes will be prorated based on your billing cycle.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Is there a free trial available?
                                    </button>
                                    </h2>

                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            We offer a 7-day free trial for all plans. No credit card required to try our basic features.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            What payment methods do you accept?
                                    </button>
                                    </h2>

                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            We accept all major credit cards (Visa, Mastercard, American Express), PayPal, and bank transfers for annual plans.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Do you offer discounts for annual billing?
                                    </button>
                                    </h2>

                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Yes! Annual plans receive a 20% discount compared to monthly billing. You'll save significantly by paying upfront.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Section -->
            <section class="contact-section section-padding" id="section_5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="mb-5">Get in touch</h2>
                        </div>

                        <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                            <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2595.065641062665!2d-122.4230416990949!3d37.80335401520422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858127459fabad%3A0x808ba520e5e9edb7!2sFrancisco%20Park!5e1!3m2!1sen!2sth!4v1684340239744!5m2!1sen!2sth" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-3 mb-lg- mb-md-0 ms-auto">
                            <h4 class="mb-3">Head office</h4>

                            <p>Lahore, Pakistan</p>

                            <hr>

                            <p class="d-flex align-items-center mb-1">
                                <span class="me-2">Phone</span>

                                <a href="tel: 309-4785572" class="site-footer-link">
                                    +92309-4785572
                                </a>
                            </p>

                            <p class="d-flex align-items-center">
                                <span class="me-2">Email</span>

                                <a href="mailto:info@company.com" class="site-footer-link">
                                    info@converter.com
                                </a>
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mx-auto">
                            <h4 class="mb-3">Sub office</h4>

                            <p>Arid institute of management science lahore</p>

                            <hr>

                            <p class="d-flex align-items-center mb-1">
                                <span class="me-2">Phone</span>

                                <a href="tel: 110-220-3400" class="site-footer-link">
                                    110-220-3400
                                </a>
                            </p>

                            <p class="d-flex align-items-center">
                                <span class="me-2">Email</span>

                                <a href="mailto:info@converter.com" class="site-footer-link">
                                    info@converter.com
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
@endsection
