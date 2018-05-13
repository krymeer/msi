<section class="clearfix">
    <h2 class="section-title">
        <?php echo $this->lang->line('contact__section_main_title'); ?>
    </h2>
    <div class="section-content">
        <?php echo $this->lang->line('contact__section_main_text'); ?>
    </div>

<?php if (isset($this->session->contact_form_status)): ?>
    <div class="alert <?php echo $this->session->contact_form_status; ?>">
        <?php echo $this->lang->line('contact__form_status_'.$this->session->contact_form_status); ?>
    </div>
<?php endif; ?>

<?php
    echo validation_errors('<div class="alert error">', '</div>');
    echo form_open('contact');
?>
        <label for="contact_name">
            <?php echo $this->lang->line('contact__section_main_form_label_1'); ?><span class="asterisk">*</span>
        </label>
        <input type="text" name="contact_name" value="<?php echo set_value('contact_name') ;?>">
        <label for="contact_email">
            <?php echo $this->lang->line('contact__section_main_form_label_2'); ?><span class="asterisk">*</span>
        </label>
        <input type="text" name="contact_email" value="<?php echo set_value('contact_email') ;?>">
        <label for="contact_message">
            <?php echo $this->lang->line('contact__section_main_form_label_3'); ?><span class="asterisk">*</span>
        </label>
        <textarea maxlength="1000" name="contact_message"><?php echo set_value('contact_message'); ?></textarea>
        <div class="asterisk-note">
            <span class="asterisk">*</span> <?php echo $this->lang->line('field_asterisk'); ?>
        </div>
        <button type="submit" name="submit">
            <?php echo $this->lang->line('contact__section_main_form_submit'); ?>
        </button>
    </form>
</section>