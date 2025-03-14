<section id="hero" class="grid grid-one gap-1 mb-6">
<?php if ($image = $page->featured_image()->toFile()): ?>
        <img class="span-2" src="<?= $image->crop(1200,800)->url() ?>" alt="<?= $image->alt() ?>">
    <?php endif ?>
    <div class="grid grid-three gap-1">
        <div class="grid grid-one gap-05">
    <p class="label lg purple"><?= $page->prefix() ?></p>
    <h1><?= $page->header() ?></h1>
    <p class="label lg purple"><?= $page->postfix() ?></p>
    </div>
    </div>
    
</section>