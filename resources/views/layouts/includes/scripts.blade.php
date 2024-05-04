{{--Include jQuery file--}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- JS Plugins -->
<script src="{{asset('plugins/jQuery/jquery.min.js')}}"></script>

<script src="{{asset('plugins/bootstrap/bootstrap.min.js')}}"></script>

<script src="{{asset('plugins/slick/slick.min.js')}}"></script>

<script src="{{asset('plugins/instafeed/instafeed.min.js')}}"></script>


<!-- Main Script -->
<script src="{{asset('js/script.js')}}"></script></body>

<!-- include summernote js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height:400,
        });
    });
</script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<!-- Toastr Script -->

<script>
        @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

<!-- Sweetalart2 js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('.logout').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
            title: 'Do you want to log out now?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit()
            }
        })
    });
</script>

{{--bootstrap JS link--}}
<script src="{{asset('user_assets/js/bootstrap.bundle.js')}}"></script>
