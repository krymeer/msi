<section>
    <h2 class="section-title">
        <?php echo $this->lang->line('news__section_main_title'); ?>
    </h2>
    <div class="section-content">
        <?php foreach($news as $news_item): ?>
            <div class="news-item clearfix">
                <div class="news-title">
                    <h3>
                        <?php echo $news_item['title']; ?>
                    </h3>
                    <div class="news-date">
                        <?php echo date_format(date_create($news_item['date']), 'j.m.Y G:i'); ?>
                    </div>
                </div>
                <div class="news-text">
                    <?php echo $news_item['text']; ?>
                </div>
                <a class="news-url button" href="<?php echo site_url('news/'.$news_item['slug']); ?>">
                    <?php echo $this->lang->line('news__read_more'); ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>