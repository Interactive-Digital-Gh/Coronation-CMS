<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Coronation CMS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css') }}?v={{ filemtime(public_path('assets/libs/css/style.css')) }}">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

    {{-- TinyMCE Editor  --}}
    @include('components.head.tinymce-config')

    {{-- Toastr Notifications  --}}
    @include('components.head.notif')
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
       @include('components.navbar')
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        @include('components.sidebar')
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Home Insurance Page</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Individual</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Inurance</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- overview  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-section" id="overview">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h2>Live Site</h2>
                                    <p class="lead">Iframe of section being edited.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <iframe style="border:2px #000 solid" src="https://coronation.com.gh/" title="iFrame" width="100%" height="400px" scrolling="no" frameborder="yes" allow=""></iframe>
                    </div>
                </div>




            <form action="{{ route('house-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')



                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3>Section 1 Texts</h3>
                        <div class="card">
                            @php
                                $caption = $home->sec1_caption;
                                $body = $home->sec1_body;
                            @endphp
                            @include('components.form-group.left-right-text-form')
                        </div>
                    </div>
                </div>










                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">

                        <a href="?type=homeowner" class="btn btn-primary btn-lg" style="margin-right: 10px">Homeowners  &nbsp
                            @if (request('type') == 'homeowner' || is_null(request('type')))
                            <span class="badge-dot badge-success"></span>
                            @endif
                        </a>

                        <a href="?type=householder" class="btn btn-primary btn-lg" style="margin-right: 10px">Householders &nbsp
                            @if (request('type') == 'householder')
                            <span class="badge-dot badge-success"></span>
                            @endif
                        </a>

                    </div>
                </div>


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        @php
                        if(request('type') == 'homeowner' || is_null(request('type')))
                        {
                            $title = 'Homeowners';

                        }elseif (request('type') == 'householder') {

                            $title = 'Householders';

                        }
                        @endphp

                        <h3> {{ $title }}</h3>
                    </div>





                    @php
                    if(request('type') == 'homeowner' || is_null(request('type')))
                    {
                        $body1 = $home->homeowner_ins_body;
                        $features = $home->homeowner_ins_features;
                        $image = $home->homeowner_ins_image;
                        $featureImage = $home->homeowner_feature_image;
                        $submit_value = 'homeowner';
                    }elseif (request('type') == 'householder') {
                        $body1 = $home->householder_ins_body;
                        $features = $home->householder_ins_features;
                        $image = $home->householder_ins_image;
                        $featureImage = $home->householder_feature_image;
                        $submit_value = 'householder';
                    }
                    @endphp


                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Upload Card Image</h5>
                            <div class="card-body">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile">File Input</label>
                                    </div>
                                    <a href="{{ asset($image) }}" target="_blank" class="btn btn-primary">View Current Image</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Upload Feature Image</h5>
                            <div class="card-body">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="feature_image">
                                        <label class="custom-file-label" for="customFile">File Input</label>
                                    </div>
                                    <a href="{{ asset($featureImage) }}" target="_blank" class="btn btn-primary">View Current Image</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="exampleFormControlTextarea1">Body</label>
                                        <textarea id="shortText" name="body1">{{ $body1 }}</textarea>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="exampleFormControlTextarea1">Features</label>
                                        <textarea id="shortText" name="features">{{ $features }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit" name="submit" value="{{ $submit_value }}" >Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('components.footer')
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
</body>

</html>
