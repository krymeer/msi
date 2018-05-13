<section>
    <h2 class="section-title">
        <?php echo $this->lang->line('account__section_login_title'); ?>
    </h2>
    <div class="section-content">
        <?php echo $this->lang->line('account__section_login_text'); ?>
    </div>

<?php if (isset($this->session->account_status)): ?>
    <div class="alert <?php echo $this->session->account_status; ?>">
        <?php echo $this->lang->line('account__activation_status_'.$this->session->account_status); ?>
    </div>
<?php elseif (isset($auth_err)): ?>
    <div class="alert error">
        <?php echo $auth_err; ?>
    </div>
<?php endif; ?>

<?php 
    echo validation_errors('<div class="alert error">', '</div>');
    echo form_open('account/login');
?>
        <label for="username">
            <?php echo $this->lang->line('account__section_login_form_label_1'); ?>
        </label>
        <input type="input" name="username">
        <label for="password">
            <?php echo $this->lang->line('account__section_login_form_label_2'); ?>
        </label>
        <input type="password" name="password">
        <button type="submit" name="submit">
            <?php echo $this->lang->line('account__section_login_form_submit'); ?>
        </button>
        <span>
            <?php echo $this->lang->line('account__section_login_form_no_account'); ?>
             <a href="/account/signup">
                <?php echo $this->lang->line('account__section_login_form_sign_up'); ?>
             </a>
        </span>
    </form>
</section>