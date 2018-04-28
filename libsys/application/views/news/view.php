<section class="clearfix">
    <h2 class="section-title">
        <?php echo $news_item['title']; ?>.
    </h2>
    <div class="section-content">
        <div class="news-author-date">
            <span>
                <?php echo $news_item['author']; ?>
            </span> 
            <span>
                <?php echo $news_item['date']; ?>
            </span>
        </div>
        <div class="news-full-text">
            <?php echo $news_item['text']; ?>
        </div>
        <a class="button news-go-back" href="/news">
            <? echo $this->lang->line('news__go_back'); ?>
        </a>
    </div>
</section>