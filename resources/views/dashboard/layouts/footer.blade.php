<script type="text/javascript">
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        /*var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {

        }*/

        if (evt.which != 46 && (evt.which < 47 || evt.which > 59))
        {
            evt.preventDefault();
            if ((evt.which == 46) && ($(this).indexOf('.') != -1)) {
                evt.preventDefault();
            }
            return false;
        }
        return true;
    }

    function lettersValidate(key) {
        //alert();
        var keycode = (key.which) ? key.which : key.keyCode;

        if ((keycode > 64 && keycode < 91) || (keycode > 96 && keycode < 123) || keycode == 32)
        {
               return true;
        }
        else
        {
            return false;
        }

    }

    function lettersValidate1(key) {
        //alert();
        var keycode = (key.which) ? key.which : key.keyCode;

        if ((keycode > 64 && keycode < 91) || (keycode > 96 && keycode < 123))
        {
               return true;
        }
        else
        {
            return false;
        }

    }

    function percentage_validation(e){
        var x = parseFloat(e);
        var per = $('#new_per').val();
        if (isNaN(x) || x < 0 || x > 100) {
            $('.per_validate').css('display','block');
            $('.per_val').val('');
        }
    }

    function validateNumber(event) {
        var key = window.event ? event.keyCode : event.which;
        if (event.keyCode === 8 || event.keyCode === 46) {
            return true;
        } else if ( key < 48 || key > 57 ) {
            return false;
        } else {
            return true;
        }
    };

</script>


   <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>

