<section>
    <h2 class="section-title">Książki.</h2>
    <div class="section-content">

    <?php if (isset($this->session->borrowing_status)): ?>
        <div class="alert <?php echo ($this->session->borrowing_status ? 'success' : 'error'); ?>">
            <?php echo $this->lang->line('borrowing_status')[(int)$this->session->borrowing_status]; ?>
        </div>
    <?php endif; ?>

    <?php if (count($books) > 0): ?>
        <table id="blook-list"> 
            <tr>
                <th>Tytuł</th>
                <th>Autor</th>
                <th>Status</th>
            </tr>

        <?php foreach ($books as $b): ?>
            <tr>
                <td><?php echo $b->book_title; ?></td>
                <td><?php echo $b->book_author; ?></td>
                <td data-book-status="<?php echo $b->book_status; ?>">
                    <i class="fas fa-circle"></i>
                </td>
                <td>

                <?php if ($b->book_status === "2") : ?>
                    <a href="/catalog/borrow/<?php echo $b->book_id; ?>">Wypożycz</a>
                <?php endif; ?>

                </td>
            </tr>
        <?php endforeach; ?>

        </table>
    <?php endif; ?>

    </div>
</section>