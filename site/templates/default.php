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



<?php
// Determine the venues value
$venues = [];

if ($page->venue()->isNotEmpty()) {
    // If the page has a value in its venue field, pass that selection
    $venues[] = $page->venue()->value();
} else {
    // If the page has no value in its venue field, pass a list of all the page's eventblock and scheduleblock venue values, omitting duplicates
    foreach ($page->blocks()->toBlocks() as $block) {
        if ($block->type() == 'eventblock' || $block->type() == 'scheduleblock') {
            foreach ($block->events()->toStructure() as $event) {
                $venueName = $event->venue()->value();
                if (!in_array($venueName, $venues)) {
                    $venues[] = $venueName;
                }
            }
        }
    }
}
?>

<?php snippet('venues', ['venues' => $venues]) ?>

<?php snippet('registration') ?>

<?php snippet('sponsors') ?>

<?php snippet('footer') ?>