<?php $this->load->view('inc/header'); ?>

<div class="container">
<?php $this->load->view('inc/nav'); ?>

<div id="contenido" class="margen-nav">
<?php $this->load->view("$seccion/".$contenido); ?>
</div><!-- /#contenido -->

</div><!-- /.container -->
<?php $this->load->view('inc/footer'); ?>