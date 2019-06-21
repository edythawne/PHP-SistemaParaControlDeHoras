<script>
    $(document).ready(showMessage());

    function showMessage() {
        <?php
            if ($this->session->message):
        ?>
        M.toast({html: '<?php echo $this->session->message; ?>'});

        <?php
            $this->session->unset_userdata('message');
            endif;
        ?>
    }
</script>
<!-- -->