<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="<?php echo base_url().'public/sellerasset/';?>assets/vendor/jquery/jquery-3.3.1.min.js">
</script>
<!-- bootstap bundle js -->
<script src="<?php echo base_url().'public/sellerasset/';?>assets/vendor/bootstrap/js/bootstrap.bundle.js">
</script>
<!-- slimscroll js -->
<script src="<?php echo base_url().'public/sellerasset/';?>assets/vendor/slimscroll/jquery.slimscroll.js">
</script>
<!-- main js -->
<script src="<?php echo base_url().'public/sellerasset/';?>assets/libs/js/main-js.js">
</script>
<!-- morris-chart js -->
<script src="<?php echo base_url().'public/sellerasset/';?>assets/vendor/charts/morris-bundle/raphael.min.js">
</script>
<script src="<?php echo base_url().'public/sellerasset/';?>assets/vendor/charts/morris-bundle/morris.js">
</script>
<script src="<?php echo base_url().'public/sellerasset/';?>assets/vendor/charts/morris-bundle/morrisjs.html">
</script>
<!-- chart js -->
<script src="<?php echo base_url().'public/sellerasset/';?>assets/vendor/charts/charts-bundle/Chart.bundle.js">
</script>
<script src="<?php echo base_url().'public/sellerasset/';?>assets/vendor/charts/charts-bundle/chartjs.js">
</script>
<!-- dashboard js -->
<script src="<?php echo base_url().'public/sellerasset/';?>assets/libs/js/dashboard-influencer.js">
</script>

<script src="<?php echo base_url().'public/sellerasset/';?>assets/vendor/myscript.js">
</script>


<script>
$('#form').parsley();
</script>
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
</script>
<script>
$('#carrc').on('change', function() {
    var fileName = $(this).val();
    var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
    $(this).next('.custom-file-label').html(cleanFileName);
});
$('#carinsurance').on('change', function() {
    var fileName = $(this).val();
    var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
    $(this).next('.custom-file-label').html(cleanFileName);
});
$('#documnet').on('change', function() {
    var fileName = $(this).val();
    var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
    $(this).next('.custom-file-label').html(cleanFileName);
});
$('#carimg').on('change', function() {
    var fileName = $(this).val();
    var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
    $(this).next('.custom-file-label').html(cleanFileName);
});
$('#hotlimg').on('change', function() {
    var fileName = $(this).val();
    var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
    $(this).next('.custom-file-label').html(cleanFileName);
});
$('#hotmullimg').on('change', function() {
    var fileName = $(this).val();
    var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
    $(this).next('.custom-file-label').html(cleanFileName);
});
function deactive(self){
   aler("function run");
    var id = self.getAttribute("data-id");
    document.getElementById("deactiveform").deleteid.value = id;
}

</script>
</body>

</html>