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
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-select/css/bootstrap-select.css') }}">

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
                            <h2 class="pageheader-title">Career Section 3</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Individual</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Career</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Section 3</li>
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




            <form action="{{ route('careers-section3-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')










                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">

                        <a href="?card=1" class="btn btn-primary btn-lg" style="margin-right: 10px">Card 1  &nbsp
                            @if (request('card') == '1' || is_null(request('card')))
                            <span class="badge-dot badge-success"></span>
                            @endif
                        </a>

                        <a href="?card=2" class="btn btn-primary btn-lg" style="margin-right: 10px">Card 2 &nbsp
                            @if (request('card') == '2')
                            <span class="badge-dot badge-success"></span>
                            @endif
                        </a>

                        <a href="?card=3" class="btn btn-primary btn-lg" style="margin-right: 10px">Card 3 &nbsp
                            @if (request('card') == '3')
                            <span class="badge-dot badge-success"></span>
                            @endif
                        </a>

                        <a href="?card=4" class="btn btn-primary btn-lg" style="margin-right: 10px">Card 4 &nbsp
                            @if (request('card') == '4')
                            <span class="badge-dot badge-success"></span>
                            @endif
                        </a>

                        <a href="?card=5" class="btn btn-primary btn-lg" style="margin-right: 10px">Card 5 &nbsp
                            @if (request('card') == '5')
                            <span class="badge-dot badge-success"></span>
                            @endif
                        </a>

                    </div>
                </div>


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        @php
                        if(request('card') == '1' || is_null(request('card')))
                        {
                            $title = 'Card 1';

                        }elseif (request('card') == '2') {

                            $title = 'Card 2';

                        }elseif (request('card') == '3') {

                        $title = 'Card 3';

                        }elseif (request('card') == '4') {

                        $title = 'Card 4';

                        }elseif (request('card') == '5') {

                        $title = 'Card 5';

                        }
                        @endphp

                        <h3> {{ $title }}</h3>
                    </div>





                    @php
                    if(request('card') == '1' || is_null(request('card')))
                    {
                        $body = $career->card1_body;
                        $caption = $career->card1_caption;
                        $image = $career->card1_image;
                        $submit_value = 'card1';
                    }elseif (request('card') == '2') {
                        $body = $career->card2_body;
                        $caption = $career->card2_caption;
                        $image = $career->card2_image;
                        $submit_value = 'card2';
                    }elseif (request('card') == '3') {
                        $body = $career->card3_body;
                        $caption = $career->card3_caption;
                        $image = $career->card3_image;
                        $submit_value = 'card3';
                    }elseif (request('card') == '4') {
                        $body = $career->card4_body;
                        $caption = $career->card4_caption;
                        $image = $career->card4_image;
                        $submit_value = 'card4';
                    }elseif (request('card') == '5') {
                        $body = $career->card5_body;
                        $caption = $career->card5_caption;
                        $image = $career->card5_image;
                        $submit_value = 'card5';
                    }
                    @endphp


                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Upload Image</h5>
                            <div class="card-body">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile">File Input</label>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- Current Image Card --}}
                    @include('components.current-image')

                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="exampleFormControlTextarea1">Caption</label>
                                        <textarea id="shortText" name="caption">{{ $caption }}</textarea>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="exampleFormControlTextarea1">Body</label>
                                        <textarea id="shortText" name="body">{{ $body }}</textarea>
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
    <script src="{{ asset('assets/vendor/bootstrap-select/js/bootstrap-select.js') }}"></script>

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
