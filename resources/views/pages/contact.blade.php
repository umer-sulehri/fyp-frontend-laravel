@extends('layouts.app')

@section('content')

<header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">

                            <center>

                                <h2 class="text-white">Contact Us</h2>
                            </center>

                </div>
            </header>


            <section class="section-padding section-bg">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h3 class="mb-4 pb-2">We'd love to hear from you</h3>
                        </div>

                        <div class="col-lg-6 col-12">
                            <form action="#" method="post" class="custom-form contact-form" role="form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="">
                                            
                                            <label for="floatingInput">Name</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12"> 
                                        <div class="form-floating">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">
                                            
                                            <label for="floatingInput">Email address</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="subject" id="name" class="form-control" placeholder="Name" required="">
                                            
                                            <label for="floatingInput">Subject</label>
                                        </div>

                                        <div class="form-floating">
                                            <textarea class="form-control" id="message" name="message" placeholder="Tell me about the project"></textarea>
                                            
                                            <label for="floatingTextarea">Tell me about the project</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 ms-auto">
                                        <button type="submit" class="form-control">Submit</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="col-lg-5 col-12 mx-auto mt-5 mt-lg-0">
                            <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2595.065641062665!2d-122.4230416990949!3d37.80335401520422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858127459fabad%3A0x808ba520e5e9edb7!2sFrancisco%20Park!5e1!3m2!1sen!2sth!4v1684340239744!5m2!1sen!2sth" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                            <h5 class="mt-4 mb-2">Our Office</h5>

                            <p>Lahore, Pakistan</p>
                        </div>

                    </div>
                </div>
            </section>

                        <!-- FAQ Section -->
                        <section class="faq-section section-padding section-bg">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 text-center mb-5">
                                        <h2 class="mb-3">Frequently Asked Questions</h2>
                                        <p>Find quick answers to common questions</p>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="accordion" id="faqAccordion">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        How long does it take to get a response?
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                                    <div class="accordion-body">
                                                        Our team typically responds within 24 hours during business days. Premium support subscribers receive responses within 4 hours.
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        What information should I include in my support request?
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                                    <div class="accordion-body">
                                                        Please include your account email, the type of device/browser you're using, and detailed steps to reproduce any issues you're experiencing.
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Do you offer phone support?
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                                    <div class="accordion-body">
                                                        Phone support is available for Enterprise customers. All other customers can reach us via email or live chat during business hours.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-12">
                                        <div class="custom-block bg-white shadow-lg p-4 h-100">
                                            <h5 class="mb-4">Live Chat Support</h5>
                                            <p class="mb-4">For immediate assistance, chat with our support team during business hours (9AM-5PM PST).</p>
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <span class="badge bg-success rounded-circle p-2">
                                                        <i class="bi-check2-all"></i>
                                                    </span>
                                                </div>
                                                <div>
                                                    <small class="text-muted">Current status</small>
                                                    <h6 class="mb-0">Online</h6>
                                                </div>
                                            </div>
                                            <a href="#" class="btn custom-btn mt-4">Start Live Chat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
@endsection
