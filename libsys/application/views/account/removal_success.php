<section>
    <h2 class="section-title">
        <?php echo $this->lang->line('account__section_removal_success_title'); ?>  
    </h2>
    <div class="section-content">
        <?php echo $this->lang->line('account__section_removal_success_text'); ?>  
        <div class="alert success">
            <?php echo $this->lang->line('alerts__account_deleted'); ?>  
        </div>
        <div class="alert info">
            <?php echo $this->lang->line('alerts__redirect'); ?>
            <span id="alert-timeout">5</span> s.
        </div>
    </div>
</section>

<script>
    $(function() {
        var t = window.setInterval(function() {
            var n = parseInt($('#alert-timeout').text());

            if (n > 0)
            {
                $('#alert-timeout').text(n-1);
            }
            else
            {
                window.clearInterval(t);
                window.location.reload();
            }

        }, 1000);
    });
</script>