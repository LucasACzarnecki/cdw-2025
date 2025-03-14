<?php snippet('head') ?>

<?php snippet('navigation') ?>

<?php snippet('hero') ?>

<?php snippet('pageschedule') ?>

<?php snippet('introduction') ?>

<section id="schedule" class="mb-10 grid grid-one gap-1">
    <h2 class="">Schedule</h2>
    <div class="grid grid-one gap-1">
        <?php foreach ($page->blocks()->toBlocks() as $block): ?>
            <?php if ($block->type() == 'eventblock'): ?>
                <?php snippet('blocks/eventblock', ['block' => $block]) ?>
                <?php elseif ($block->type() == 'scheduleblock'): ?>
                <?php snippet('blocks/scheduleblock', ['block' => $block]) ?>
            <?php endif ?>
        <?php endforeach ?>
    </div>

</section>

<?php snippet('registration') ?>

<?php snippet('sponsors') ?>

<?php snippet('footer') ?>