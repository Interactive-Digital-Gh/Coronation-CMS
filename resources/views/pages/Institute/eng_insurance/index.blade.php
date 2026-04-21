<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Coronation CMS</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

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
                            <h2 class="pageheader-title">Engineering Insurance Page</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Institute</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Insurance</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Engineering</li>
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


            <form action="{{ route('institute-engineering-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')



                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            @php
                                $caption = $eng->sec1_caption;
                                $body = $eng->sec1_body;
                            @endphp
                            @include('components.form-group.left-right-text-form')
                        </div>
                    </div>
                </div>



                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">

                        <a href="?type=plant" class="btn btn-primary btn-lg" style="margin-right: 10px">Plant All - Risk  &nbsp
                            @if (request('type') == 'plant' || is_null(request('type')))
                            <span class="badge-dot badge-success"></span>
                            @endif
                        </a>

                        <a href="?type=contractors" class="btn btn-primary btn-lg" style="margin-right: 10px">Contractors All - Risk &nbsp
                            @if (request('type') == 'contractors')
                            <span class="badge-dot badge-success"></span>
                            @endif
                        </a>

                        <a href="?type=machinery" class="btn btn-primary btn-lg" style="margin-right: 10px">Machinery Breakdown &nbsp
                            @if (request('type') == 'machinery')
                            <span class="badge-dot badge-success"></span>
                            @endif
                        </a>

                        <a href="?type=erection" class="btn btn-primary btn-lg" style="margin-right: 10px">Erection All - RIsk &nbsp
                            @if (request('type') == 'erection')
                            <span class="badge-dot badge-success"></span>
                            @endif
                        </a>

                        <a href="?type=computer" class="btn btn-primary btn-lg" style="margin-right: 10px">
                            Electronic Equipment Computer All - Risk &nbsp
                            @if (request('type') == 'computer')
                            <span class="badge-dot badge-success"></span>
                            @endif
                        </a>
                    </div>
                </div>


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        @php
                        if(request('type') == 'plant' || is_null(request('type')))
                        {
                            $title = 'Plant All - Risk';

                        }elseif (request('type') == 'contractors') {

                            $title = 'Contractors All - Risk';

                        }elseif (request('type') == 'machinery') {

                            $title = 'Machinery Breakdown';

                        }elseif (request('type') == 'erection') {

                        $title = 'Erection All - Risk';

                        }elseif (request('type') == 'computer') {

                        $title = 'Electronic Equipment Computer All - Risk';

                        }
                        @endphp

                        <h2> {{ $title }}</h2>
                    </div>



                    @php
                    if(request('type') == 'plant' || is_null(request('type')))
                    {
                        $image = $eng->plant_all_risk_image;
                        $body1 = $eng->plant_all_risk_body;
                        $features = $eng->plant_all_risk_features;
                        $featureImage = $eng->plant_all_risk_features_image;
                        $submit_value = 'plant';
                    }elseif (request('type') == 'contractors') {
                        $image = $eng->contractors_all_risk_image;
                        $body1 = $eng->contractors_all_risk_body;
                        $features = $eng->contractors_all_risk_features;
                        $featureImage = $eng->contractors_all_risk_features_image;
                        $submit_value = 'contractors';
                    }elseif (request('type') == 'machinery') {
                        $image = $eng->machinery_breakdown_image;
                        $body1 = $eng->machinery_breakdown_body;
                        $features = $eng->machinery_breakdown_features;
                        $featureImage = $eng->machinery_breakdown_features_image;
                        $submit_value = 'machinery';
                    }elseif (request('type') == 'erection') {
                        $image = $eng->erection_all_image;
                        $body1 = $eng->erection_all_body;
                        $features = $eng->erection_all_features;
                        $featureImage = $eng->erection_all_features_image;
                        $submit_value = 'erection';
                    }elseif (request('type') == 'computer') {
                        $image = $eng->computer_all_risk_image;
                        $body1 = $eng->computer_all_risk_body;
                        $features = $eng->computer_all_risk_features;
                        $featureImage = $eng->computer_all_risk_features_image;
                        $submit_value = 'computer';
                    }
                    @endphp

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h3>Image</h3>
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
                                        <textarea id="shortText" name="insurance_body">{{ $body1 }}</textarea>
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

    <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/libs/js/main-js.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
</body>

</html>
