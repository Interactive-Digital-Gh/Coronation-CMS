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
                            <h2 class="pageheader-title">Contact Messages</h2>
                            <p class="pageheader-text">Messages submitted through the contact form on the website. Newest first.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Website</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Contact Messages</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="section-block">
                        <h3 class="section-title">All Messages <span class="badge badge-secondary">{{ $messages->total() }}</span></h3>
                    </div>
                    <div class="card">
                        <div class="campaign-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0">Date</th>
                                        <th class="border-0">Name</th>
                                        <th class="border-0">Email</th>
                                        <th class="border-0">Phone</th>
                                        <th class="border-0">Request</th>
                                        <th class="border-0">Enquiry</th>
                                        <th class="border-0">Company</th>
                                        <th class="border-0">Message</th>
                                        <th class="border-0">Preferred date/time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($messages as $item)
                                    <tr>
                                        <td class="text-nowrap">{{ $item->created_at->format('d M Y, H:i') }}</td>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                                        <td class="text-nowrap"><a href="tel:{{ $item->phone_number }}">{{ $item->phone_number }}</a></td>
                                        <td>{{ $item->request_related ?: '—' }}</td>
                                        <td>{{ $item->enquiry_related ?: '—' }}</td>
                                        <td>{{ $item->company_related ?: '—' }}</td>
                                        <td style="max-width: 320px; white-space: pre-wrap;">{{ $item->message }}</td>
                                        <td class="text-nowrap">{{ $item->preferred_date_time ?: '—' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-muted py-4">No contact messages yet.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if ($messages->hasPages())
                        <div class="card-body">
                            {{ $messages->links('pagination::bootstrap-4') }}
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
