<div class="container">
    <h2><?= esc($title) ?></h2>

    <?= session()->getFlashdata('error') ?>
    <?= validation_list_errors() ?>


    <form action="/news" method="post">
        <?= csrf_field() ?>

        <label for="title" class="form-label"> Title </label>
        <input type="input" class="form-control" name="title" value="<?= set_value('title') ?>">
    
    
        <br>

        <label for="body" class="form-label">Text</label>
        <textarea name="body" class="form-control" cols="45" rows="4"><?= set_value('body') ?></textarea>
        <br>

        <input type="submit" class="btn btn-success" name="submit" value="Create news item">    
    </form>
</div>