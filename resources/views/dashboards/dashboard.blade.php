@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <style>
            /* Dashboard Specific Styles */
            .dashboard-wrapper {
                display: flex;
                min-height: calc(100vh - 70px);
                margin-top: 70px;
            }
            
            .dashboard-sidebar {
                width: 280px;
                background: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
                padding: 30px 0;
                position: relative;
                z-index: 1;
            }
            
            .dashboard-content {
                flex: 1;
                padding: 30px;
                background-color: #f8f9fa;
            }
            
            .sidebar-menu {
                list-style: none;
                padding: 0;
                margin: 0;
            }
            
            .sidebar-menu li {
                margin-bottom: 5px;
            }
            
            .sidebar-menu a {
                display: block;
                color: var(--white-color);
                padding: 12px 25px;
                text-decoration: none;
                transition: all 0.3s;
                font-family: var(--title-font-family);
                font-weight: var(--font-weight-medium);
            }
            
            .sidebar-menu a:hover,
            .sidebar-menu a.active {
                background-color: rgba(255,255,255,0.2);
                color: var(--white-color);
            }
            
            .sidebar-menu i {
                margin-right: 10px;
                font-size: 18px;
            }
            
            .user-profile {
                text-align: center;
                padding: 20px;
                margin-bottom: 20px;
                border-bottom: 1px solid rgba(255,255,255,0.2);
            }
            
            .user-profile img {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                object-fit: cover;
                border: 3px solid var(--white-color);
                margin-bottom: 15px;
            }
            
            .user-profile h5 {
                color: var(--white-color);
                margin-bottom: 5px;
            }
            
            .user-profile p {
                color: rgba(255,255,255,0.7);
                font-size: 14px;
            }
            
            .dashboard-card {
                background-color: var(--white-color);
                border-radius: var(--border-radius-medium);
                padding: 25px;
                margin-bottom: 30px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            }
            
            .dashboard-card h4 {
                color: var(--primary-color);
                margin-bottom: 20px;
                padding-bottom: 10px;
                border-bottom: 1px solid #eee;
            }
            
            .conversion-history {
                list-style: none;
                padding: 0;
            }
            
            .conversion-item {
                padding: 15px;
                border-bottom: 1px solid #eee;
                transition: all 0.3s;
            }
            
            .conversion-item:hover {
                background-color: var(--section-bg-color);
            }
            
            .conversion-item h6 {
                margin-bottom: 5px;
            }
            
            .conversion-item p {
                font-size: 14px;
                margin-bottom: 5px;
                color: var(--p-color);
            }
            
            .conversion-meta {
                display: flex;
                justify-content: space-between;
                font-size: 13px;
                color: #999;
            }
            
            .form-group {
                margin-bottom: 20px;
            }
            
            @media (max-width: 992px) {
                .dashboard-wrapper {
                    flex-direction: column;
                }
                
                .dashboard-sidebar {
                    width: 100%;
                    padding: 15px 0;
                }
                
                .sidebar-menu {
                    display: flex;
                    overflow-x: auto;
                    padding: 0 15px;
                }
                
                .sidebar-menu li {
                    margin-right: 10px;
                    margin-bottom: 0;
                    white-space: nowrap;
                }
                
                .user-profile {
                    display: none;
                }
            }
        </style>

        <div class="dashboard-wrapper">
            <!-- Sidebar -->
            <div class="dashboard-sidebar">
                <div class="user-profile">
                    <img src="https://via.placeholder.com/150" alt="User Profile">
                    <h5>John Doe</h5>
                    <p>Premium Member</p>
                </div>
                
                <ul class="sidebar-menu">
                    <li><a href="#" class="active" data-content="profile"><i class="bi-person"></i> Profile Settings</a></li>
                    <li><a href="#" data-content="conversions"><i class="bi-collection"></i> My Conversions</a></li>
                    <li><a href="#" data-content="billing"><i class="bi-credit-card"></i> Billing</a></li>
                    <li><a href="#" data-content="notifications"><i class="bi-bell"></i> Notifications</a></li>
                    <li><a href="#" data-content="support"><i class="bi-question-circle"></i> Support</a></li>
                    <li><a href="index.html"><i class="bi-box-arrow-left"></i> Logout</a></li>
                </ul>
            </div>
            
            <!-- Content Area -->
            <div class="dashboard-content">
                <!-- Profile Settings Content (default shown) -->
                <div class="dashboard-card" id="profile-content">
                    <h4><i class="bi-person me-2"></i> Profile Settings</h4>
                    
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" value="John">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" value="Doe">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" value="john.doe@example.com">
                        </div>
                        
                        <div class="form-group">
                            <label for="currentPassword">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="newPassword">New Password</label>
                                    <input type="password" class="form-control" id="newPassword">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmPassword">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="profileImage">Profile Image</label>
                            <input type="file" class="form-control" id="profileImage">
                        </div>
                        
                        <button type="submit" class="custom-btn">Update Profile</button>
                    </form>
                </div>
                
                <!-- Conversions Content (hidden by default) -->
                <div class="dashboard-card" id="conversions-content" style="display: none;">
                    <h4><i class="bi-collection me-2"></i> My Conversions</h4>
                    
                    <div class="input-group mb-4">
                        <input type="text" class="form-control" placeholder="Search conversions...">
                        <button class="btn btn-outline-secondary" type="button"><i class="bi-search"></i></button>
                    </div>
                    
                    <ul class="conversion-history">
                        <li class="conversion-item">
                            <h6>Marketing Strategy Meeting</h6>
                            <p>Converted from video to text with 98% accuracy</p>
                            <div class="conversion-meta">
                                <span><i class="bi-calendar me-1"></i> June 15, 2023</span>
                                <span><i class="bi-clock me-1"></i> 45:22 duration</span>
                                <span><a href="#" class="text-primary">Download</a></span>
                            </div>
                        </li>
                        
                        <li class="conversion-item">
                            <h6>Product Demo Video</h6>
                            <p>Converted from video to text with 95% accuracy</p>
                            <div class="conversion-meta">
                                <span><i class="bi-calendar me-1"></i> June 10, 2023</span>
                                <span><i class="bi-clock me-1"></i> 12:45 duration</span>
                                <span><a href="#" class="text-primary">Download</a></span>
                            </div>
                        </li>
                        
                        <li class="conversion-item">
                            <h6>Team Standup Meeting</h6>
                            <p>Converted from video to text with 97% accuracy</p>
                            <div class="conversion-meta">
                                <span><i class="bi-calendar me-1"></i> June 5, 2023</span>
                                <span><i class="bi-clock me-1"></i> 30:15 duration</span>
                                <span><a href="#" class="text-primary">Download</a></span>
                            </div>
                        </li>
                        
                        <li class="conversion-item">
                            <h6>Customer Interview</h6>
                            <p>Converted from video to text with 96% accuracy</p>
                            <div class="conversion-meta">
                                <span><i class="bi-calendar me-1"></i> May 28, 2023</span>
                                <span><i class="bi-clock me-1"></i> 52:10 duration</span>
                                <span><a href="#" class="text-primary">Download</a></span>
                            </div>
                        </li>
                        
                        <li class="conversion-item">
                            <h6>Conference Presentation</h6>
                            <p>Converted from video to text with 94% accuracy</p>
                            <div class="conversion-meta">
                                <span><i class="bi-calendar me-1"></i> May 20, 2023</span>
                                <span><i class="bi-clock me-1"></i> 1:25:45 duration</span>
                                <span><a href="#" class="text-primary">Download</a></span>
                            </div>
                        </li>
                    </ul>
                    
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                
                <!-- Billing Content (hidden by default) -->
                <div class="dashboard-card" id="billing-content" style="display: none;">
                    <h4><i class="bi-credit-card me-2"></i> Billing Information</h4>
                    
                    <div class="alert alert-success">
                        <i class="bi-check-circle me-2"></i> Your Premium subscription is active until July 15, 2023
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Current Plan</h5>
                                    <h2 class="text-primary">Premium</h2>
                                    <p class="card-text">$19.99/month</p>
                                    <ul class="list-unstyled">
                                        <li><i class="bi-check text-success me-2"></i> Unlimited conversions</li>
                                        <li><i class="bi-check text-success me-2"></i> High accuracy (98%)</li>
                                        <li><i class="bi-check text-success me-2"></i> Priority support</li>
                                        <li><i class="bi-check text-success me-2"></i> Advanced features</li>
                                    </ul>
                                    <button class="btn btn-outline-danger">Cancel Subscription</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Payment Method</h5>
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi-credit-card-2-front fs-3 me-3"></i>
                                        <div>
                                            <h6 class="mb-0">Visa ending in 4242</h6>
                                            <small class="text-muted">Expires 05/2025</small>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-primary">Update Payment Method</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h5 class="mt-4">Billing History</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jun 15, 2023</td>
                                    <td>Premium Subscription</td>
                                    <td>$19.99</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td><a href="#"><i class="bi-download"></i></a></td>
                                </tr>
                                <tr>
                                    <td>May 15, 2023</td>
                                    <td>Premium Subscription</td>
                                    <td>$19.99</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td><a href="#"><i class="bi-download"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Apr 15, 2023</td>
                                    <td>Premium Subscription</td>
                                    <td>$19.99</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td><a href="#"><i class="bi-download"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Notifications Content (hidden by default) -->
                <div class="dashboard-card" id="notifications-content" style="display: none;">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4><i class="bi-bell me-2"></i> Notifications</h4>
                        <button class="btn btn-sm btn-outline-secondary">Mark all as read</button>
                    </div>
                    
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">New feature available</h6>
                                <small class="text-muted">Today</small>
                            </div>
                            <p class="mb-1">We've added a new keyword extraction tool to help you analyze your video content.</p>
                        </a>
                        
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Your subscription was renewed</h6>
                                <small class="text-muted">3 days ago</small>
                            </div>
                            <p class="mb-1">Your Premium subscription has been automatically renewed for another month.</p>
                        </a>
                        
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Conversion completed</h6>
                                <small class="text-muted">1 week ago</small>
                            </div>
                            <p class="mb-1">Your video "Marketing Strategy Meeting" has been successfully converted with 98% accuracy.</p>
                        </a>
                        
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">System maintenance</h6>
                                <small class="text-muted">2 weeks ago</small>
                            </div>
                            <p class="mb-1">We'll be performing scheduled maintenance this weekend. The service may be temporarily unavailable.</p>
                        </a>
                    </div>
                </div>
                
                <!-- Support Content (hidden by default) -->
                <div class="dashboard-card" id="support-content" style="display: none;">
                    <h4><i class="bi-question-circle me-2"></i> Support Center</h4>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi-envelope me-2"></i> Contact Support</h5>
                                    <form>
                                        <div class="form-group">
                                            <label for="supportSubject">Subject</label>
                                            <input type="text" class="form-control" id="supportSubject">
                                        </div>
                                        <div class="form-group">
                                            <label for="supportMessage">Message</label>
                                            <textarea class="form-control" id="supportMessage" rows="5"></textarea>
                                        </div>
                                        <button type="submit" class="custom-btn">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi-info-circle me-2"></i> Help Resources</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none"><i class="bi-book me-2"></i> Documentation</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none"><i class="bi-youtube me-2"></i> Video Tutorials</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none"><i class="bi-question-square me-2"></i> FAQs</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none"><i class="bi-chat-left-text me-2"></i> Community Forum</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        

    <script>
        $(document).ready(function() {
            // Handle sidebar menu clicks
            $('.sidebar-menu a').on('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all menu items
                $('.sidebar-menu a').removeClass('active');
                
                // Add active class to clicked menu item
                $(this).addClass('active');
                
                // Get the content to show
                var contentId = $(this).data('content') + '-content';
                
                // Hide all content sections
                $('.dashboard-card').hide();
                
                // Show the selected content section
                $('#' + contentId).show();
            });
            
            // Show profile content by default
            $('#profile-content').show();
        });
    </script>

@endsection
