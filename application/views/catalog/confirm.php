<section>
    <h2 class="section-title">
        <?php echo $this->lang->line('catalog__section_confirm_title'); ?>
    </h2>
    <div class="section-content">
        <strong><? echo $this->lang->line('book'); ?>:</strong> <?php echo $book_author; ?>, <i><?php echo $book_title; ?></i><br>
        <strong><? echo $this->lang->line('user'); ?>:</strong> <?php echo $book_user; ?>

        <div class="choice-box">
            <?php echo $this->lang->line('catalog__borrowing_confirm_box'); ?>
            <div class="choice-answers">
                <a class="button" href="/catalog/confirm/<?php echo $book_id; ?>/<?php echo $book_user_id; ?>">
                    <?php echo $this->lang->line('word_yes'); ?>
                </a>
                <a class="button" href="/catalog">
                    <?php echo $this->lang->line('word_no'); ?>
                </a>
            </div>
        </div>
    </div>
</section>