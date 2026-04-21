<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Homepage Section 2</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css') }}?v={{ filemtime(public_path('assets/libs/css/style.css')) }}">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-select/css/bootstrap-select.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

    {{-- TinyMCE Editor  --}}
    @include('components.head.tinymce-config')
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
                            <h2 class="pageheader-title">Insights</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Individual</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Insights</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add New Blog</li>
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
                                    <h2>Create New Blog Post</h2>
                                    <p class="lead"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="{{ route('submit-blog') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Upload Blog Cover Image</h5>
                            <div class="card-body">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="main_image">
                                        <label class="custom-file-label" for="customFile">File Input</label>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Upload Article PDF</h5>
                            <div class="card-body">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="pdf_file">
                                        <label class="custom-file-label" for="customFile">File Input</label>
                                    </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            {{-- <h5 class="card-header">Section 2 Text</h5> --}}
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="exampleFormControlTextarea1">Blog Caption</label>
                                        <textarea id="shortText" name="caption">{{ old('caption') }}</textarea>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="exampleFormControlTextarea1">Blog Excerpt</label>
                                        <textarea id="shortText" name="excerpt">{{ old('excerpt') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-row mt-5">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <label for="exampleFormControlTextarea1">Blog Body</label>
                                        <textarea id="blogBody" name="body">{{ old('body') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Blog Category (Type new category or select from existing category)</h5>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2 mt-2">
                                        <label for="exampleFormControlTextarea1">Type Blog Category</label>
                                        <input id="inputText3" type="text" class="form-control form-control-lg" placeholder="Eg. Insurance" name="new_category" value="{{ old('new_category') }}">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                        <h5 class="card-title">Select Existing Category</h5>
                                        <select class="selectpicker" data-width="85%" name="existing_category">
                                            @foreach ( $categories as $category)
                                                <option {{ old('existing_category') == ucfirst($category->category) ? 'selected' : '' }}>{{ ucfirst($category->category) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3>Section 2</h3>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Upload Image</h5>
                            <div class="card-body">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">File Input</label>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Upload Image</h5>
                            <div class="card-body">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">File Input</label>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <button class="btn btn-primary btn-block" type="submit" name="submit" value="" >Submit</button>
            </form>
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
    <script src="../assets/vendor/bootstrap-select/js/bootstrap-select.js"></script>
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
