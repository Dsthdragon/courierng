

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->


<!-- Morris Charts JavaScript -->
<script src="<?php echo URL; ?>adminpublic/js/plugins/morris/raphael.min.js"></script>
<script src="<?php echo URL; ?>adminpublic/js/plugins/morris/morris.min.js"></script>
<script src="<?php echo URL; ?>adminpublic/js/plugins/morris/morris-data.js"></script>
<?php
if (isset($this->js)) {
    foreach ($this->js as $js) {
        echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
    }
}
?>

</section>
</body>
</html>