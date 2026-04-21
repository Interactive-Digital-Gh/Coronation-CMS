<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Individual
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link {{ Route::is('home-*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-home"></i>Homepage <span class="badge badge-success">6</span></a>
                        <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home-header') }}">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home-sec1') }}">Section 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home-sec2') }}">Section 2</a>
                                </li>
                            </ul>
                        </div>
                    </li>



                    <li class="nav-item ">
                        <a class="nav-link {{ Route::is('about-*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-info-circle"></i>About Page <span class="badge badge-success">6</span></a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about-header') }}">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about-sec1') }}">Section 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about-sec2') }}">Section 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about-sec3') }}">Section 3</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about-sec4') }}">Section 4</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about-sec5') }}">Board of Directors</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('executive-table') }}">Executive Members</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('pns-*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-14" aria-controls="submenu-14"><i class="fa fa-fw fa-cubes"></i>Products & Solutions</a>
                        <div id="submenu-14" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('pns-header') }}">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('pns-sec1') }}">Section 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('pns-sec2') }}">Section 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('pns-motor*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-15" aria-controls="submenu-15"> Motor Insurance</a>
                                    <div id="submenu-15" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('pns-motor-header') }}">Motor Insurance Header</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('pns-motor') }}">Motor Insurance Page</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('pns-motor-benefits') }}">Benefits</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('pns-travel*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-16" aria-controls="submenu-16"> Travel Insurance</a>
                                    <div id="submenu-16" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('pns-travel-header') }}">Travel Insurance Header</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('pns-travel') }}">Travel Insurance Page</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('pns-travel-benefits') }}">Benefits</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('pns-house*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-17" aria-controls="submenu-17"> Home Insurance</a>
                                    <div id="submenu-17" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('pns-house-header') }}">Home Insurance Header</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('pns-house-insurance') }}">Home Insurance Page</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('pns-home-benefits') }}">Benefits</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>



                    {{-- <li class="nav-item ">
                        <a class="nav-link {{ Route::is('pns-*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fa fa-fw fa-user-circle"></i> Producs & Solutions Page <span class="badge badge-success">6</span></a>
                        <div id="submenu-3" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('pns-header') }}">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('pns-sec1') }}">Section 1</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('motor*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fa fa-fw fa-user-circle"></i> Motor Insuance Page <span class="badge badge-success">6</span></a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('motor-header') }}">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('motor') }}">Motor Insurance</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('travel-*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fa fa-fw fa-user-circle"></i> Travel Insuance Page <span class="badge badge-success">6</span></a>
                        <div id="submenu-5" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('travel-header') }}">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('travel') }}">Travel Insurance</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('house-*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fa fa-fw fa-user-circle"></i> Home Insuance Page <span class="badge badge-success">6</span></a>
                        <div id="submenu-6" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('house-header') }}">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('house-insurance') }}">Home Insurance</a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}


                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('blogs-*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fa fa-fw fa-lightbulb"></i> Insights<span class="badge badge-success">7</span></a>
                        <div id="submenu-7" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('blogs-all') }}">All Blogs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('add-blog') }}">Add New Blog</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('careers-*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fa fa-fw fa-briefcase"></i> Careers<span class="badge badge-success">8</span></a>
                        <div id="submenu-8" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('careers-header') }}">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('careers-section1') }}">Section 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('careers-section2') }}">Section 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('careers-section3') }}">Section 3</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('contact-*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fa fa-fw fa-envelope"></i> Contact<span class="badge badge-success">9</span></a>
                        <div id="submenu-9" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact-header') }}">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact-details') }}">Contacts</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-divider">
                        Institute
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link {{ Route::is('institute-pns-*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fa fa-fw fa-user-circle"></i> Products & Solutions<span class="badge badge-success">10</span></a>
                        <div id="submenu-10" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('institute-pns-header') }}">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('institute-pns-section1') }}">Section 1</a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}

                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('institute-pns-*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-18" aria-controls="submenu-18"><i class="fa fa-fw fa-building"></i>Institute Products & Solutions</a>
                        <div id="submenu-18" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('institute-pns-header') }}">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('institute-pns-section1') }}">Section 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('institute-pns-section2') }}">Section 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('institute-pns-motor*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-19" aria-controls="submenu-19">Motor Insuance</a>
                                    <div id="submenu-19" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('institute-pns-motor-header') }}">Header</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('institute-pns-motor-page') }}">Motor Insurance</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('institute-pns-motor-benefits') }}">Benefits</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('institute-pns-engineering*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-20" aria-controls="submenu-20">Engineering Insuance </a>
                                    <div id="submenu-20" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('institute-pns-engineering-header') }}">Header</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('institute-pns-engineering-page') }}">Engineering Insurance</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('institute-pns-engineering-benefits') }}">Benefits</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('institute-pns-marine*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-21" aria-controls="submenu-21">Marine Insuance</a>
                                    <div id="submenu-21" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('institute-pns-marine-header') }}">Header</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('institute-pns-marine-page') }}">Marine Insurance</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('institute-pns-marine-benefits') }}">Benefits</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-14" aria-controls="submenu-14"><i class="fas fa-f fa-folder"></i>Menu Level</a>
                        <div id="submenu-14" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Level 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-15" aria-controls="submenu-15">Level 2</a>
                                    <div id="submenu-15" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Level 1</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Level 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Level 3</a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}

                    {{-- <li class="nav-item">
                        <a class="nav-link {{ Route::is('institute-motor-*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11"><i class="fa fa-fw fa-user-circle"></i> Motor Insuance Page <span class="badge badge-success">11</span></a>
                        <div id="submenu-11" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('institute-motor-header') }}">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('institute-motor-page') }}">Motor Insurance</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('institute-marine-*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-13" aria-controls="submenu-13"><i class="fa fa-fw fa-user-circle"></i> Marine Insuance Page <span class="badge badge-success">13</span></a>
                        <div id="submenu-13" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('institute-marine-header') }}">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">Marine Insurance</a>
                                </li>
                            </ul>
                        </div>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('institute-engineering-*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-12" aria-controls="submenu-12"><i class="fa fa-fw fa-user-circle"></i> Engineering Insuance Page <span class="badge badge-success">12</span></a>
                        <div id="submenu-12" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('institute-engineering-header') }}">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('institute-engineering-page') }}">Engineering Insurance</a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}

                    {{-- <li class="nav-item">
                        <a class="nav-link {{ Route::is('institute-marine-*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-13" aria-controls="submenu-13"><i class="fa fa-fw fa-user-circle"></i> Marine Insuance Page <span class="badge badge-success">13</span></a>
                        <div id="submenu-13" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('institute-marine-header') }}">Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">Marine Insurance</a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </nav>
    </div>
</div>
