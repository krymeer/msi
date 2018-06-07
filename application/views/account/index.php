<section>
    <h2 class="section-title">
        <?php echo $this->lang->line('account__section_main_title').', '.$this->session->username; ?>!</h2>
    <div class="section-content">
        <?php echo $this->lang->line('account__section_main_text'); ?>
    </div>

<?php if (isset($this->session->account_status)): ?>
    <div class="alert <?php echo $this->session->account_status[0]; ?>">
        <?php echo $this->lang->line('account__user_data_changed')[$this->session->account_status[1]]; ?>
    </div>
<?php endif; ?>

</section>
<section>
    <h2 class="section-title">
        <?php echo $this->lang->line('account__section_settings_title'); ?></h2>
    <div class="section-content">
        <?php echo $this->lang->line('account__section_settings_text'); ?>
        <ul id="account-settings-list">
            <li>
                <a href="/account/password/change">
                    <?php echo $this->lang->line('account__section_password_title'); ?>
                </a>
            </li>
            <li>
                <a href="/account/remove">
                    <?php echo $this->lang->line('account__section_remove_link'); ?>
                </a>
            </li>
        </ul>
    </div>
</section>