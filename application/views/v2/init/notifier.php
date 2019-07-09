<script>
    $(document).ready(showMessage());

    function showMessage() {
        <?php if ($this->session->message):?>
            var html_content =
                "<h3>Mensaje</h3>" +
                "<p> <?php echo $this->session->message; ?> </p>";
            Metro.infobox.create(html_content);
        <?php $this->session->unset_userdata('message'); endif; ?>
    }
</script>