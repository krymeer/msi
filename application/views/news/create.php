<section class="clearfix">
    <h2 class="section-title">
        <?php echo $this->lang->line('news__section_add_title'); ?>
    </h2>

<?php if (isset($this->session->news_status)): ?>
    <div class="alert <?php echo $this->session->news_status; ?>">
        <?php echo $this->lang->line('news__addition_status_'.$this->session->news_status); ?>
    </div>
<?php endif; ?>

<?php
    echo validation_errors('<div class="alert error">', '</div>');
    echo form_open('news/create');
?>
        <label for="news_title">
            <?php echo $this->lang->line('news__section_add_form_label_1'); ?>
        </label>
        <input type="input" name="news_title" value="<?php echo set_value('news_title') ;?>">
        <label for="news_text">
            <?php echo $this->lang->line('news__section_add_form_label_2'); ?>
        </label>
        <textarea name="news_text"><?php echo set_value('news_text'); ?></textarea>
        <button type="submit" name="submit">
            <?php echo $this->lang->line('news__section_add_form_submit'); ?>
        </button>
    </form>
</section>