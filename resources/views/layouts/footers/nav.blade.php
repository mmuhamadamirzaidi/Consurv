<div class="row align-items-center justify-content-xl-between">
    <div class="col-xl-12">
        <div class="copyright text-center text-xl-center text-muted">
            &copy; {{ now()->year }} <a href="#" class="font-weight-bold ml-1" target="_blank">ECG Health Risk System</a>
        </div>
    </div>
</div>

@push('js')
<script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    $('.tr_click').click(function (e) {
        $route = $(this).attr('data-url');
        window.location = $route;
    });
</script>
@endpush