    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>js/application.js"></script>
    <script src="<?php echo URL; ?>lib/js/jquery-3.1.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>lib/js/tether.min.js"></script>
    <script src="<?php echo URL; ?>lib/js/bootstrap.min.js"></script>

    <script src="<?php echo URL; ?>js/host.js"></script>
    <script src="<?php echo URL; ?>js/perform.js"></script>
    <script src="<?php echo URL; ?>js/user.js"></script>
</body>
</html>
