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
    <link rel="stylesheet" href="{{ asset(\'assets/libs/css/style.css\') }}?v={{ filemtime(public_path(\'assets/libs/css/style.css\')) }}">
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
                            <h2 class="pageheader-title">Motor Insurance Page</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Individual</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Inurance</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Motor</li>
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


            <form action="{{ route('motor-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3>Background Image</h3>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Upload Section 1 Image</h5>
                            <div class="card-body">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile">File Input</label>
                                    </div>
                            </div>
                        </div>
                    </div>

                    @php
                    $image = $motor->sec1_image;
                    @endphp
                    {{-- Current Image Card --}}
                    @include('components.current-image')

                </div>



                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            @php
                                $caption = $motor->sec1_caption;
                                $body = $motor->sec1_body;
                            @endphp
                            @include('components.form-group.left-right-text-form')
                        </div>
                    </div>
                </div>



                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">

                        <a href="?type=comp" class="btn btn-primary btn-lg" style="margin-right: 10px">Comprehensive Insurance  &nbsp
                            @if (request('type') == 'comp' || is_null(request('type')))
                            <span class="badge-dot badge-success"></span>
                            @endif
                        </a>

                        <a href="?type=tpft" class="btn btn-primary btn-lg" style="margin-right: 10px">Third Party Fire and Theft &nbsp
                            @if (request('type') == 'tpft')
                            <span class="badge-dot badge-success"></span>
                            @endif
                        </a>

                        <a href="?type=tpo" class="btn btn-primary btn-lg" style="margin-right: 10px">Third Part Only &nbsp
                            @if (request('type') == 'tpo')
                            <span class="badge-dot badge-success"></span>
                            @endif
                        </a>

                    </div>
                </div>


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        @php
                        if(request('type') == 'comp' || is_null(request('type')))
                        {
                            $title = 'Comprehensive Insurance';

                        }elseif (request('type') == 'tpft') {

                            $title = 'Third Party Fire and Theft';

                        }elseif (request('type') == 'tpo') {

                            $title = 'Third Party Only';

                        }
                        @endphp

                        <h3> {{ $title }}</h3>
                    </div>



                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h5>Features Image</h5>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Upload Image</h5>
                            <div class="card-body">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="feature_image">
                                        <label class="custom-file-label" for="customFile">File Input</label>
                                    </div>
                            </div>
                        </div>
                    </div>
                    @php
                    if(request('type') == 'comp' || is_null(request('type')))
                    {
                        $image = $motor->compliance_ins_feature_image;
                        $body1 = $motor->compliance_ins_body;
                        $features = $motor->compliance_ins_features;
                        $submit_value = 'comp';
                    }elseif (request('type') == 'tpft') {
                        $image = $motor->tp_fire_theft_features_image;
                        $body1 = $motor->tp_fire_theft_body;
                        $features = $motor->tp_fire_theft_features;
                        $submit_value = 'tpft';
                    }elseif (request('type') == 'tpo') {
                        $image = $motor->tp_only_features_image;
                        $body1 = $motor->tp_only_body;
                        $features = $motor->tp_only_features;
                        $submit_value = 'tpo';
                    }
                    @endphp
                    {{-- Current Image Card --}}
                    @include('components.current-image')

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
