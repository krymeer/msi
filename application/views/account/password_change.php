<section>
    <h2 class="section-title">
        <?php echo $this->lang->line('account__section_password_title'); ?>.</h2>
    <div class="section-content">
        <?php echo $this->lang->line('account__section_password_text'); ?>
    </div>

<?php 
    echo validation_errors('<div class="alert alert-normal error">', '</div>');
    echo form_open('account/password/change', array('class' => 'form-normal'));
?>
        <label for="passchange_passcurr">
            <?php echo $this->lang->line('account__section_password_form_label_1'); ?><span class="asterisk">*</span>
        </label>
        <input value="<?php echo set_value('passchange_passcurr') ;?>" type="password" name="passchange_passcurr">

        <label for="passchange_password">
            <?php echo $this->lang->line('account__section_password_form_label_2'); ?><span class="asterisk">*</span>
        </label>
        <input value="<?php echo set_value('passchange_password') ;?>" type="password" name="passchange_password">

        <label for="passchange_passconf">
            <?php echo $this->lang->line('account__section_password_form_label_3'); ?><span class="asterisk">*</span>
        </label>
        <input value="<?php echo set_value('passchange_passconf') ;?>" type="password" name="passchange_passconf">

        <div class="asterisk-note">
            <span class="asterisk">*</span> <?php echo $this->lang->line('field_asterisk'); ?>
        </div>
        <button type="submit" name="passchange_submit">
            <?php echo $this->lang->line('account__section_password_form_submit'); ?>
        </button>
    </form>
</section>