<?php snippet('head') ?>

<?php snippet('navigation') ?>

<?php snippet('hero') ?>

<?php snippet('pageschedule') ?>

<?php snippet('introduction') ?>

<section id="schedule" class="mb-10 grid grid-one gap-3">
    <h2 class="">Schedule</h2>
    <div class="grid grid-one gap-3">
        <?php foreach ($page->blocks()->toBlocks() as $block): ?>
            <?php if ($block->type() == 'scheduleblock'): ?>
                <?php snippet('blocks/scheduleblock', ['block' => $block]) ?>
            <?php endif ?>
        <?php endforeach ?>
    </div>

</section>

<?php snippet('registration') ?>



<?php snippet('footer') ?>