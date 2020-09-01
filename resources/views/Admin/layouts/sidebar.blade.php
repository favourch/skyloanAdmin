<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">


                <li> <a class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-monitor e mr-10"></i><span class="hide-menu">Skyloan Admin</span></a></li>


                <li> <a class="waves-effect waves-dark" href="{{route('admin.dashboard')}}">
                        <span class="hide-menu">Dashboard</span></a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{route('admin.user-management')}}">
                        <i class="fa fa-users"></i><span class="hide-menu"> User Management</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"> <i class="fa fa-money"></i> <span class="hide-menu">Loan Management</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.check-loan-amount')}}">Loan Amount</a></li>
                        <li><a href="{{route('admin.check-pending-loans')}}">Pending Loans</a></li>
                        <li><a href="{{route('admin.check-active-loans')}}">Active Loans</a></li>
                        <li><a href="{{route('admin.check-overdue-loans')}}">Overdue</a>	</li>
                        <li><a href="{{route('admin.check-mature-loans')}}">Matured Loans</a></li>
                    </ul>
                </li>
                {{--<li>
                    <a class="waves-effect waves-dark" href="{{route('admin.loan-management')}}">
                        <i class="fa fa-money"></i><span class="hide-menu"> Loan Management</span>
                    </a>
                </li>--}}
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"> <i class="fa fa-cog"></i> <span class="hide-menu">System Settings</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.loan-system-settings')}}">Loan Properties</a></li>
                        <li><a href="{{route('admin.lg-state-system-settings')}}">LGS/State Settings</a></li>
                        <li><a href="{{route('admin.others-system-settings')}}">Others</a>	</li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{route('admin.view-contact-message')}}">
                        <i class="fa fa-envelope"></i><span class="hide-menu"> Contact Us</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{route('admin.logout')}}">
                      <i class="fa fa-sign-out"></i><span class="hide-menu"> Logout</span>
                    </a>
                </li>

                {{--<li> <a class="waves-effect waves-dark" href="ecommerce-orders.html"> <i class="ti-angle-right"></i> <span class="hide-menu">
                    Order Status </span></a></li>

                <li><a class="waves-effect waves-dark" href="ecommerce-product-list.html"> <i class="ti-angle-right"></i> <span class="hide-menu">Products Catalogue</span></a></li>

                <li><a class="waves-effect waves-dark" href="ecommerce-pro-list.html"> <i class="ti-angle-right"></i> <span class="hide-menu">Product List - List view   </span></a></li>

                <li><a class="waves-effect waves-dark" href="ecommerce-products-catalogue.html"> <i class="ti-angle-right"></i> <span class="hide-menu">Product List - grid view </span></a></li>

                <li><a class="waves-effect waves-dark" href="ecommerce-products-details.html"> <i class="ti-angle-right"></i> <span class="hide-menu">Product Details</span></a></li>

                <li><a class="waves-effect waves-dark" href="ecommerce-add-edit-products.html"> <i class="ti-angle-right"></i> <span class="hide-menu">Add/Edit Products</span></a></li>

                <li><a class="waves-effect waves-dark" href="ecommerce-view-customers.html"> <i class="ti-angle-right"></i> <span class="hide-menu">View Customers</span></a></li>

                <li><a class="waves-effect waves-dark" href="ecommerce-invoice.html"> <i class="ti-angle-right"></i> <span class="hide-menu">Invoice</span></a></li>

                <li><a class="waves-effect waves-dark" href="ecommerce-shipments.html"> <i class="ti-angle-right"></i> <span class="hide-menu">Shipments</span></a></li>

                <li><a class="waves-effect waves-dark " href="ecommerce-reviews.html"> <i class="ti-angle-right"></i> <span class="hide-menu">Reviews</span></a></li>



                <li> <a class="has-arrow waves-effect waves-dark" href="authentication-login.html" aria-expanded="false"> <i class="mdi mdi-login-variant"></i> <span class="hide-menu">Authentication</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="authentication-account-settings.html">Account Settings</a></li>
                        <li><a href="authentication-login.html">Login</a></li>
                        <li><a href="authentication-register.html">Register</a>	</li>
                        <li><a href="password-recovery.html">Password Recovery</a></li>
                        <li><a href="lockscreen.html">Lockscreen</a></li>
                    </ul>
                </li>--}}




            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
