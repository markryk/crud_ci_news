<div class="container">
    <h2><?= esc($news['title']) ?></h2>
    <p><?= esc($news['body']) ?></p>

    <a href="/" class="btn btn-outline-dark"><ion-icon name="arrow-back-outline"></ion-icon> Back </a>
    <a href="/news/edit/<?= esc($news['slug'], 'url') ?>" class="btn btn-warning"><ion-icon name="create"></ion-icon> Edit news </a>
    <a href="/news/delete/<?= esc($news['slug'], 'url') ?>" class="btn btn-danger"><ion-icon name="trash"></ion-icon> Delete news </a>
    <br>
</div>