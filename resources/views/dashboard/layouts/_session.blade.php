@if (session('success'))
    <script>
        // On load Toast
        setTimeout(function () {
            toastr['success'](
                "<h5>{{session('success')}}</h5>",
                'success!',
                {
                    closeButton: true,
                    tapToDismiss: false,
                }
            );
        }, 100);
    </script>
@endif

@if (session('error'))
    <script>
        // On load Toast
        setTimeout(function () {
            toastr['error'](
                "<h5>{{session('error')}}</h5>",
                'error!',
                {
                    closeButton: true,
                    tapToDismiss: false,
                }
            );
        }, 100);
    </script>
@endif

@if (session('warning'))
    <script>
        // On load Toast
        setTimeout(function () {
            toastr['warning'](
                "<h5>{{session('warning')}}</h5>",
                'warning!',
                {
                    closeButton: true,
                    tapToDismiss: false,
                }
            );
        }, 100);
    </script>
@endif
