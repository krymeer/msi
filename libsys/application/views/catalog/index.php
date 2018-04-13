<section>
    <h2 class="section-title">Książki.</h2>
    <div class="section-content">


        Lorem ipsum dolor sit amet, consecteur adipiscing elit.

    <?php if (count($books) > 0): ?>
        <table id="blook-list">
            <tr>
                <th>Tytuł</th>
                <th>Autor</th>
                <th>Status</th>
            </tr>

        <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo $book->title; ?></td>
                <td><?php echo $book->author; ?></td>
                <td data-book-status="<?php echo $book->status; ?>">
                    <i class="fas fa-circle"></i>
                </td>
                <td>

                <?php if ($book->status === "2") : ?>
                    <a href="/catalog/borrow/<?php echo $book->id; ?>">Wypożycz</a>
                <?php endif; ?>

                </td>
            </tr>
        <?php endforeach; ?>

        </table>
    <?php endif; ?>

    </div>
</section>