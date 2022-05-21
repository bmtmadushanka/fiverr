<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/modernizr.min.js')}}"></script>
<script src="{{asset('assets/js/waves.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>

<script src="{{asset('assets/plugins/jquery-knob/excanvas.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-knob/jquery.knob.js')}}"></script>

<script src="{{asset('assets/plugins/chart.js/chart.min.js')}}"></script>
<script src="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/pages/dashboard.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
     // Example starter JavaScript for disabling form submissions if there are invalid fields
     (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    $(document).ready( function () {
        //To set csrf token to all ajax calls
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() } });
          //$('#ErpTable').DataTable();
          $('.select2').select2();
    } );
    $('.numaric').on('change, keyup', function () {
        var currentInput = $(this).val();
        var fixedInput = currentInput.replace(/[A-Za-z!@#$%^&*()]/g, '');
        $(this).val(fixedInput);
        console.log(fixedInput);
    });
</script>
<!-- jQuery UI 1.11.4 -->

@yield('scripts')
