<section>
    <h2 class="section-title"><?php echo $this->lang->line('catalog__sections_main_title'); ?>.</h2>
    <div class="section-content">
        <?php echo $this->lang->line('catalog__sections_main_text'); ?>

    <?php if (isset($this->session->borrowing_status)): ?>
        <div class="alert <?php echo $this->session->borrowing_status[1]; ?>">
            <?php echo $this->lang->line('catalog__borrowing_status')[$this->session->borrowing_status[0]]; ?>
        </div>
    <?php endif; ?>

        <form id="book-search-form" method="get" action="/catalog/" >
            <input type="text" placeholder="<?php echo $this->lang->line('catalog__search_placeholder'); ?>" id="book-search-input" name="search"<?php if (isset($book_search)) echo 'value="'.$book_search.'"'; ?>>
            <button type="submit" id="book-search-submit">
                <i class="fas fa-search"></i>
            </button>
        </form>

    <?php if (isset($num_pages) && $num_pages > 1): ?>
        <div class="page-nav">
            <?php for ($k = 1; $k <= $num_pages; $k++): ?>
                <a href="/catalog/<?php echo $k; ?>" class="button <?php if (isset($page_no) && $k === $page_no) echo 'page-current'; ?>">
                    <?php echo $k; ?>
                </a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>

        <div id="book-list-wrapper">

        <?php if (isset($book_search)): ?>
            <h3 class="section-subtitle">
                <?php echo $this->lang->line('catalog__search_results'); ?>
            </h3>

            <?php if (count($books) === 0): ?>
                    <?php echo $this->lang->line('catalog__search_no_results'); ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (count($books) > 0): ?>
            <table id="book-list">
                <tr>
                    <th><?php echo $this->lang->line('catalog__book_title'); ?></th>
                    <th><?php echo $this->lang->line('catalog__book_author'); ?></th>
                    <th><?php echo $this->lang->line('catalog__book_id'); ?></th>
                    <th><?php echo $this->lang->line('catalog__book_status'); ?></th>

                <?php if ($this->session->logged_in): ?>
                    <th></th>
                <?php endif; ?>

                </tr>

            <?php foreach ($books as $b): ?>
                <tr>
                    <td><?php echo $b->book_title; ?></td>
                    <td><?php echo $b->book_author_surname.' '.$b->book_author_given_names; ?></td>
                    <td class="book-codes">
                        <span>ISBN:</span> <?php echo $b->book_isbn; ?><br>
                        <span>EAN:</span> <?php echo $b->book_ean; ?>
                    </td>
                    <td data-book-status="<?php echo $b->book_status; ?>">
                        <i class="fas fa-square"></i>
                    </td>

                <?php if ($this->session->logged_in): ?>
                    <td class="book-action">

                    <?php if ($b->book_status === "2" && !$this->session->is_librarian) : ?>
                        <a class="button dark small" href="/catalog/borrow/<?php echo $b->book_id; ?>"><?php echo $this->lang->line('catalog__action_borrow'); ?></a>
                    <?php elseif ($b->book_status === "1" && $this->session->is_librarian): ?>
                        <a class="button dark small" href="/catalog/borrow/<?php echo $b->book_id; ?>/confirm"><?php echo $this->lang->line('catalog__action_confirm'); ?></a>
                        <a class="button dark small" href="/catalog/borrow/<?php echo $b->book_id; ?>/cancel"><?php echo $this->lang->line('catalog__action_cancel'); ?></a>
                    <?php elseif ($b->book_status === "0" && $this->session->is_librarian ): ?>
                        <a class="button dark small" href="/catalog/borrow/<?php echo $b->book_id; ?>/return"><?php echo $this->lang->line('catalog__action_return'); ?></a>
                    <?php endif; ?>

                    </td>
                <?php endif; ?>

                </tr>
            <?php endforeach; ?>

            </table>
        <?php endif; ?>

        </div>

    <?php if ($this->session->is_librarian): ?>
        <a class="button" id="book-add-button" href="/catalog/add">
            <?php echo $this->lang->line('catalog__section_add_title'); ?>
        </a>
    <?php endif; ?>

    </div>
</section>