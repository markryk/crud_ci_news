<h2><?= esc($title) ?></h2>

<a href="/news/new" class="btn btn-success"><ion-icon name="add"></ion-icon> Adicionar notícia </a>
<br><br>

<?php if (! empty($news) && is_array($news)): ?>

    <div class="row">
        <?php foreach ($news as $news_item): ?>
        
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <!--<img src="..." class="card-img-top" alt="...">-->
                    <div class="card-body">
                        <h5 class="card-title"> <?= esc($news_item['title']) ?> </h5>
                        <p class="card-text">
                            <div class="main">
                                <?= esc($news_item['body']) ?>
                            </div>
                        </p>
                        <a href="/news/<?= esc($news_item['slug'], 'url') ?>" class="btn btn-primary"><ion-icon name="newspaper"></ion-icon> View Article</a>
                    </div>
                </div>
            </div>
            <br>
        

        <!--<div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> <?= esc($news_item['title']) ?> </h5>
                <p class="card-text">
                    <div class="main">
                        <?= esc($news_item['body']) ?>
                    </div>
                </p>
                <a href="/news<?= esc($news_item['slug'], 'url') ?>" class="btn btn-primary"> View Article</a>
            </div>
        </div>-->

        <?php endforeach ?>
    </div>

<?php else: ?>
    <h3>No News</h3>
    <p>Unable to find any news for you.</p>
<?php endif ?>