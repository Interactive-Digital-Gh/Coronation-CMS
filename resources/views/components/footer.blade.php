<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                 Coroations Insurance | Interactive Digital.
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="text-md-right footer-links d-none d-sm-block">
                    <a href="javascript: void(0);">About</a>
                    <a href="javascript: void(0);">Support</a>
                    <a href="javascript: void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


@if ($errors->any())
    <script>
        $(document).ready(function() {
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        });
    </script>
@endif

<script>
    // Client-side mirror of the image size cap (config/uploads.php). The server
    // still validates; this just saves editors a round trip on oversized files.
    (function () {
        var maxKb = {{ (int) config('uploads.max_image_kb') }};
        var maxLabel = (maxKb % 1024 === 0 ? maxKb / 1024 : (maxKb / 1024).toFixed(1)) + ' MB';

        $(document).on('change', 'input[type="file"]', function () {
            var file = this.files && this.files[0];
            if (!file || file.type.indexOf('image/') !== 0 || file.size <= maxKb * 1024) {
                return;
            }

            toastr.error('"' + file.name + '" is ' + (file.size / 1048576).toFixed(1) + ' MB. Images must be ' + maxLabel + ' or smaller.');
            this.value = '';
            $(this).siblings('.custom-file-label').text('File Input');
        });
    })();
</script>
