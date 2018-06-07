<section>
    <h2 class="section-title"><?php echo $book_author?>.</h2>
    <div class="section-content">

    <?php if (isset($alert_msg)): ?>
        <div class="alert">
            <?php echo $alert_msg; ?>
        </div>
    <?php endif; ?>

        <div>
            <?php foreach ($actions as $action): ?>
                <a class="action button" href="<?php echo $action['url']; ?>">
                    <?php echo $this->lang->line($action['name']); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>