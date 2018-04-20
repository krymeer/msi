<section>
    <h2 class="section-title"><?php echo $this->lang->line('catalog__sections_main_title'); ?>.</h2>
    <div class="section-content">
        <?php echo $this->lang->line('catalog__sections_main_text'); ?>

    <?php if (isset($this->session->borrowing_status)): ?>
        <div class="alert <?php echo ($this->session->borrowing_status ? 'success' : 'error'); ?>">
            <?php echo $this->lang->line('catalog__borrowing_status')[(int)$this->session->borrowing_status]; ?>
        </div>
    <?php endif; ?>

    <?php if (count($books) > 0): ?>
        <table id="book-list"> 
            <tr>
                <th><?php echo $this->lang->line('catalog__book_title'); ?></th>
                <th><?php echo $this->lang->line('catalog__book_author'); ?></th>
                <th><?php echo $this->lang->line('catalog__book_status'); ?></th>
            
            <?php if ($this->session->logged_in): ?>    
                <th></th>
            <?php endif; ?>
            
            </tr>

        <?php foreach ($books as $b): ?>
            <tr>
                <td><?php echo $b->book_title; ?></td>
                <td><?php echo $b->book_author; ?></td>
                <td data-book-status="<?php echo $b->book_status; ?>">
                    <i class="fas fa-square"></i>
                </td>
             
            <?php if ($this->session->logged_in): ?>    
                <td>

                <?php if ($b->book_status === "2") : ?>
                    <a class="button dark small" href="/catalog/borrow/<?php echo $b->book_id; ?>"><?php echo $this->lang->line('catalog__action_borrow'); ?></a>
                <?php endif; ?>

                </td>
            <?php endif; ?>
            
            </tr>
        <?php endforeach; ?>

        </table>
    <?php endif; ?>

    </div>
</section>