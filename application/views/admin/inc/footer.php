
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/locales/bootstrap-datepicker.es.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.datepicker').datepicker({
		format:"dd/mm/yyyy",
		weekStart:1
	});
});
</script>
</body>
</html>