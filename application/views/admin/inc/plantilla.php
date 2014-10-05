<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('admin/inc/header');
?>

<div class="container">
<?php $this->load->view('admin/inc/nav'); ?>

<div id="contenido" class="margen-nav">
<?php $this->load->view('admin/'.$contenido); ?>
</div><!-- /#contenido -->

</div><!-- /.container -->
<?php $this->load->view('admin/inc/footer'); ?>