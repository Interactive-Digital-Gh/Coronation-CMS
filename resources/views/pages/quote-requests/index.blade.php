<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Coronation Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css') }}?v={{ filemtime(public_path('assets/libs/css/style.css')) }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

    {{-- Toastr Notifications  --}}
    @include('components.head.notif')
</head>

<body>
    <div class="dashboard-main-wrapper">
        @include('components.navbar')
        @include('components.sidebar')

        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Quote Requests</h2>
                            <p class="pageheader-text">Quote requests submitted through the "Get a Free Quote" forms on the website product pages. Newest first.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Website</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Quote Requests</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="section-block">
                        <h3 class="section-title">All Requests <span class="badge badge-secondary">{{ $requests->total() }}</span></h3>
                    </div>
                    <div class="card">
                        <div class="campaign-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0">Date</th>
                                        <th class="border-0">Product</th>
                                        <th class="border-0">Name</th>
                                        <th class="border-0">Email</th>
                                        <th class="border-0">Phone</th>
                                        <th class="border-0">Message</th>
                                        <th class="border-0">Page</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($requests as $quote)
                                    <tr>
                                        <td class="text-nowrap">{{ $quote->created_at->format('d M Y, H:i') }}</td>
                                        <td>{{ $quote->product }}</td>
                                        <td>{{ $quote->full_name }}</td>
                                        <td><a href="mailto:{{ $quote->email }}">{{ $quote->email }}</a></td>
                                        <td class="text-nowrap"><a href="tel:{{ $quote->phone }}">{{ $quote->phone }}</a></td>
                                        <td style="max-width: 320px; white-space: pre-wrap;">{{ $quote->message ?: '—' }}</td>
                                        <td>
                                            @if ($quote->page_url)
                                                <a href="{{ $quote->page_url }}" target="_blank" rel="noopener">{{ \Illuminate\Support\Str::limit(parse_url($quote->page_url, PHP_URL_PATH) ?: $quote->page_url, 40) }}</a>
                                            @else
                                                —
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">No quote requests yet.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if ($requests->hasPages())
                        <div class="card-body">
                            {{ $requests->links('pagination::bootstrap-4') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            @include('components.footer')
        </div>
    </div>

    <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/libs/js/main-js.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>
