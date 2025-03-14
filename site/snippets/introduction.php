<section id="about" class="grid grid-two gap-2 mb-10">
   
    <?php if ($image = $page->about_image()->toFile()): ?>
        <img class="" src="<?= $image->crop(1200,1200)->url() ?>" alt="<?= $image->alt() ?>">
    <?php endif ?>
    <div class="grid grid-one gap-1 cta-block purple-block torn-paper">
    <?= $page->introduction() ?>
    </div>
</section>