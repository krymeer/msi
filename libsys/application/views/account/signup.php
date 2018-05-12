<section class="clearfix">
    <h2 class="section-title">
        <?php echo $this->lang->line('account__section_signup_title'); ?>.
    </h2>
    <div class="section-content">
        <?php echo $this->lang->line('account__section_signup_text'); ?>
    </div>

<?php if (isset($signup_err)): ?>
    <div class="alert error"><?php echo $signup_err; ?></div>
<?php endif; ?>

<?php 
    echo validation_errors('<div class="alert error">', '</div>');
    echo form_open('account/signup');
?>
        <label for="username">
            <?php echo $this->lang->line('account__section_signup_form_label_1'); ?><span class="asterisk">*</span>
        </label>
        <input value="<?php echo set_value('username') ;?>" type="text" name="username">

        <label for="password">
            <?php echo $this->lang->line('account__section_signup_form_label_2'); ?><span class="asterisk">*</span>
        </label>
        <input value="<?php echo set_value('password') ;?>" type="password" name="password">

        <label for="passconf">
            <?php echo $this->lang->line('account__section_signup_form_label_3'); ?><span class="asterisk">*</span>
        </label>
        <input value="<?php echo set_value('passconf') ;?>" type="password" name="passconf">

        <label for="email">
            <?php echo $this->lang->line('account__section_signup_form_label_4'); ?><span class="asterisk">*</span>
        </label>
        <input value="<?php echo set_value('email') ;?>" type="text" name="email">

        <label for="given_names">
            <?php echo $this->lang->line('account__section_signup_form_label_5'); ?><span class="asterisk">*</span>
        </label>
        <input value="<?php echo set_value('given_names') ;?>" type="text" name="given_names">

        <label for="surname">
            <?php echo $this->lang->line('account__section_signup_form_label_6'); ?><span class="asterisk">*</span>
        </label>
        <input value="<?php echo set_value('surname') ;?>" type="text" name="surname">

        <button type="submit" name="submit">
            <?php echo $this->lang->line('account__section_signup_form_submit'); ?>
        </button>
    </form>
</section>