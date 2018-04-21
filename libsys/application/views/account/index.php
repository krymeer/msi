<section>
    <h2 class="section-title">
        <?php echo $this->lang->line('account__section_main_title').', '.$this->session->username; ?>!</h2>
    <div class="section-content">
        <?php echo $this->lang->line('account__section_main_text'); ?>
    </div>
</section>
<section>
    <h2 class="section-title">
        <?php echo $this->lang->line('account__section_settings_title'); ?></h2>
    <div class="section-content">
        Edytuj podstawowe dane dotyczące Twojego konta:
        <ul id="account-settings-list">
            <li>
                <a href="/account/change/password">Zmień hasło</a>
            </li>
            <li>
                <a href="/account/remove">Usuń konto</a>
            </li>
        </ul>
    </div>
</section>