<section class="clearfix">
    <h2 class="section-title">
        <?php echo $this->lang->line('account__section_signup_title'); ?>.
    </h2>
    <div class="section-content">
        <?php echo $this->lang->line('account__section_signup_text'); ?>
    </div>

<?php if (isset($signup_err)): ?>
    <div class="alert alert-normal error"><?php echo $signup_err; ?></div>
<?php endif; ?>

<?php 
    echo validation_errors('<div class="alert alert-normal error">', '</div>');
    echo form_open('account/signup', array('class' => 'form-normal'));
?>
        <label for="signup_username">
            <?php echo $this->lang->line('account__section_signup_form_label_1'); ?><span class="asterisk">*</span>
        </label>
        <input value="<?php echo set_value('signup_username') ;?>" type="text" name="signup_username">

        <label for="signup_password">
            <?php echo $this->lang->line('account__section_signup_form_label_2'); ?><span class="asterisk">*</span>
        </label>
        <input value="<?php echo set_value('signup_password') ;?>" type="password" name="signup_password">

        <label for="signup_passconf">
            <?php echo $this->lang->line('account__section_signup_form_label_3'); ?><span class="asterisk">*</span>
        </label>
        <input value="<?php echo set_value('signup_passconf') ;?>" type="password" name="signup_passconf">

        <label for="signup_email">
            <?php echo $this->lang->line('account__section_signup_form_label_4'); ?><span class="asterisk">*</span>
        </label>
        <input value="<?php echo set_value('signup_email') ;?>" type="text" name="signup_email">

        <label for="signup_given_names">
            <?php echo $this->lang->line('account__section_signup_form_label_5'); ?><span class="asterisk">*</span>
        </label>
        <input value="<?php echo set_value('signup_given_names') ;?>" type="text" name="signup_given_names">

        <label for="signup_surname">
            <?php echo $this->lang->line('account__section_signup_form_label_6'); ?><span class="asterisk">*</span>
        </label>
        <input value="<?php echo set_value('signup_surname') ;?>" type="text" name="signup_surname">
        <div class="asterisk-note">
            <span class="asterisk">*</span> <?php echo $this->lang->line('field_asterisk'); ?>
        </div>
        <button type="submit" name="signup_submit">
            <?php echo $this->lang->line('account__section_signup_form_submit'); ?>
        </button>
    </form>
</section>