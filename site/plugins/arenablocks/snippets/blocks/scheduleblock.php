<?php
// Get the block fields
$datetime = $block->datetime()->value();
$events = $block->events()->toStructure();
?>

<div class="schedule-block grid grid-four gap-3">
    <div class="schedule-datetime">
        <h3><?= $datetime ?></h3>
    </div>
    <div class="schedule-events grid grid-one span-3 gap-3">
        <?php foreach ($events as $event): ?>
            <?php $eventPage = $event->event()->toPage(); ?>
            <?php if ($eventPage): ?>
                <div id="<?= $eventPage->slug() ?>" class="schedule-event grid grid-three gap-1 ">
                    <img src="<?= $eventPage->featured_image()->toFile()->crop(800,800)->url() ?>" alt="">
                    <div class="grid grid-one gap-05 span-2 <?= $event->featured()->bool() ? 'cta-block yellow-block torn-paper' : '' ?>">
                        <h3 class="h2"><?= $eventPage->title() ?></h3>
                        <p class="label <?= $event->featured()->bool() ? '' : 'purple' ?>"><?= $eventPage->time() ?> at <?= $eventPage->location() ?></p>
                        <p class="label <?= $event->featured()->bool() ? '' : 'purple' ?>"><?= $eventPage->cost() ?></p>
                        <p><?= $eventPage->description() ?></p>
                        <?php if ($event->linked()->bool()): ?>
                            <a class="btn" href="<?= $eventPage->url() ?>">Read more</a>
                        <?php endif ?>
                    </div>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</div>