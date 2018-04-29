<section>
    <h2 class="section-title">
        <?php echo $this->lang->line('news__section_main_title'); ?>
    </h2>
    <div class="section-content">
        <?php foreach($news as $news_item): ?>
            <div class="news-item clearfix">
                <div class="news-title">
                    <h3>
                        <?php echo $news_item['news_title']; ?>
                    </h3>
                    <div class="news-date">
                        <?php echo date_format(date_create($news_item['news_date']), 'j.m.Y G:i'); ?>
                    </div>
                </div>
                <div class="news-text">
                    <?php echo $news_item['news_text']; ?>
                </div>
                <a class="news-url button" href="<?php echo site_url('news/'.$news_item['news_slug']); ?>">
                    <?php echo $this->lang->line('news__read_more'); ?>
                </a>
            </div>
        <?php endforeach; ?>
        <?php if ($this->session->is_librarian): ?>
            <a href="/news/create">
                <?php echo $this->lang->line('news__add'); ?>
            </a>
        <?php endif; ?>
    </div>
</section>