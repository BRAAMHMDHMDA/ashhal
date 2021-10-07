{{--<footer class="footer footer-static footer-light">--}}
{{--    <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>--}}
{{--</footer>--}}
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>


<!-- BEGIN: Vendor JS-->
<script src="{{ asset('dashboard_files/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('dashboard_files/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{ asset('dashboard_files/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
<script src="{{ asset('dashboard_files/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('dashboard_files/app-assets/js/scripts/forms/form-select2.js') }}"></script>
<script src="{{ asset('dashboard_files/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('dashboard_files/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('dashboard_files/app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('dashboard_files/app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
<!-- END: Page JS-->

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>

<script>$('#logout').on('click', function (e) {e.preventDefault();$('#logout-form').submit()})</script>
<script>
    $('.delete').click(function (e) {
        var that = $(this)
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ml-1'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                that.closest('form').submit();
            }
        });
    });//end of confirmation delete
</script>

@stack('scripts')
