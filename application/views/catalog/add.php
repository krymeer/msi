<section class="clearfix">
    <h2 class="section-title">
        <?php echo $this->lang->line('catalog__section_add_title'); ?>.
    </h2>
    <div class="section-content">
        <?php echo $this->lang->line('catalog__section_add_text'); ?>
        <div class="notice">
            <?php echo $this->lang->line('catalog__section_add_notice'); ?>
        </div>
    </div>

<?php 
    echo validation_errors('<div class="alert error">', '</div>');
    echo form_open('catalog/add');
?>
        <label for="book_title">
            <?php echo $this->lang->line('catalog__section_add_form_label_1'); ?>
        </label>
        <input type="text" name="book_title" value="<?php echo set_value('book_title') ;?>">
        <label for="book_author_1">
            <?php echo $this->lang->line('catalog__section_add_form_label_2'); ?>
        </label>
        <input type="text" name="book_author_1" value="<?php echo set_value('book_author_1') ;?>">
        <label for="book_author_2">
            <?php echo $this->lang->line('catalog__section_add_form_label_3'); ?>
        </label>
        <input type="text" name="book_author_2" value="<?php echo set_value('book_author_2') ;?>">
        <label for="book_isbn">
            <?php echo $this->lang->line('catalog__section_add_form_label_4'); ?>
        </label>
        <input type="text" name="book_isbn" value="<?php echo set_value('book_isbn') ;?>">
        <label for="book_ean">
            <?php echo $this->lang->line('catalog__section_add_form_label_5'); ?>
        </label>
        <input type="text" name="book_ean" value="<?php echo set_value('book_ean') ;?>">
        <button type="submit" name="submit">
            <?php echo $this->lang->line('word_add'); ?>
        </button>
    </form>    
</section>