<div class="container">
    <h2> Edit news item </h2>

    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>


    <form action="/news/update" method="post">
        <?= csrf_field() ?>

        <label for="title" class="form-label"> Title </label>
        <input type="input" class="form-control" name="title" value="<?= $news['title'] ?>">
    
        <br>

        <label for="body" class="form-label">Text</label>
        <textarea name="body" class="form-control" cols="45" rows="4"><?= $news['body'] ?></textarea>
        <br>

        <input type="hidden" class="form-control" name="id" value="<?= $news['id'] ?>">

        <a href="/" class="btn btn-outline-dark"> Back </a>
        <input type="submit" class="btn btn-warning" name="submit" value="Update news item">    
    </form>
</div>