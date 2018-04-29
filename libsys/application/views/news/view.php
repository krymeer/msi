<section class="clearfix">
    <h2 class="section-title">
        <?php echo $news_item['news_title']; ?>.
    </h2>
    <div class="section-content">
        <div class="news-author-date">
            <span>
                <?php echo $news_item['news_author']; ?>
            </span> 
            <span>
                <?php echo $news_item['news_date']; ?>
            </span>
        </div>
        <div class="news-full-text">
            <?php echo $news_item['news_text']; ?>
        </div>
        <a class="button news-go-back" href="/news">
            <? echo $this->lang->line('news__go_back'); ?>
        </a>
    </div>
</section>