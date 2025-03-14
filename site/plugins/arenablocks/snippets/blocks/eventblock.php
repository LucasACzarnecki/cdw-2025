<?php
// Get the block fields
$datetime = $block->datetime()->value();
$events = $block->events()->toStructure();
$format = $block->format()->value();
?>


<?php if ($block->header()->isNotEmpty()): ?>
    <div class="mt-2">
        <h2 class="h1 pink"><?= $block->header() ?></h2>


        <?php if ($block->subheader()->isNotEmpty()): ?>
            <h4 class="label"><?= $block->subheader() ?></h4>
        <?php endif ?>
    </div>
<?php endif ?>

<div class="schedule-block grid grid-four gap-3">
    <div class="schedule-datetime">
        <h3><?= $datetime ?></h3>
    </div>
    <?php if ($format == '1 Column'): ?>
        <div class="schedule-events grid grid-one span-3 gap-3 mb-3">
            <?php foreach ($events as $event): ?>
                <?php if ($event->image()->isEmpty()): ?>
                    <div id="<?= $event->id() ?>" class="schedule-event grid grid-one gap-1 <?= $event->featured()->bool() ? 'cta-block yellow-block torn-paper' : '' ?>">
                        <h3 class="h2"><?= $event->title() ?></h3>
                        <?php if ($event->detail()->isNotEmpty()): ?>
                            <p class="label <?= $event->featured()->bool() ? '' : 'purple' ?>"><?= $event->detail() ?></p>
                        <?php endif ?>
                        <?= $event->description()->kt() ?>
                        <?php if ($event->link_url()->isNotEmpty()): ?>
                            <a class="btn" href="<?= $event->link_url() ?>"><?= $event->link_text() ?></a>
                        <?php endif ?>
                    </div>
                <?php else: ?>
                    <div id="<?= $event->id() ?>" class="schedule-event grid grid-three gap-1 ">
                        <img src="<?= $event->image()->toFile()->url() ?>" alt="<?= $event->title() ?>">
                        <div class="grid grid-one gap-1 span-2 <?= $event->featured()->bool() ? 'cta-block yellow-block torn-paper' : '' ?>">
                            <h3 class="h2"><?= $event->title() ?></h3>
                            <?php if ($event->detail()->isNotEmpty()): ?>
                                <p class="label <?= $event->featured()->bool() ? '' : 'purple' ?>"><?= $event->detail() ?></p>
                            <?php endif ?>
                            <?= $event->description()->kt() ?>
                            <?php if ($event->link_url()->isNotEmpty()): ?>
                                <a class="btn" href="<?= $event->link_url() ?>"><?= $event->link_text() ?></a>
                            <?php endif ?>
                        </div>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    <?php elseif ($format == '2 Columns'): ?>
        <div class="schedule-event grid grid-two span-3 gap-3 mb-3">
            <?php foreach ($events as $event): ?>
                <div id="<?= $event->id() ?>" class="schedule-event-item grid grid-one gap-1 ">
                    <?php if ($event->image()->isNotEmpty()): ?>
                        <img src="<?= $event->image()->toFile()->url() ?>" alt="<?= $event->title() ?>">
                    <?php endif ?>
                    <div class="grid grid-one gap-1 <?= $event->featured()->bool() ? 'cta-block yellow-block torn-paper' : '' ?>">
                        <h3 class="h2"><?= $event->title() ?></h3>
                        <?php if ($event->detail()->isNotEmpty()): ?>
                            <p class="label <?= $event->featured()->bool() ? '' : 'purple' ?>"><?= $event->detail() ?></p>
                        <?php endif ?>
                        <?= $event->description()->kt() ?>
                        <?php if ($event->link_url()->isNotEmpty()): ?>
                            <a class="btn" href="<?= $event->link_url() ?>"><?= $event->link_text() ?></a>
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php elseif ($format == '3 Columns'): ?>
        <div class="schedule-event grid grid-three span-4 gap-3 mb-3">
            <?php foreach ($events as $event): ?>
                <div id="<?= $event->id() ?>" class="schedule-event-item grid grid-one gap-1 ">
                    <?php if ($event->image()->isNotEmpty()): ?>
                        <img src="<?= $event->image()->toFile()->url() ?>" alt="<?= $event->title() ?>">
                    <?php endif ?>
                    <div class="grid grid-one gap-1 <?= $event->featured()->bool() ? 'cta-block yellow-block torn-paper' : '' ?>">
                        <h3 class="h2"><?= $event->title() ?></h3>
                        <?php if ($event->detail()->isNotEmpty()): ?>
                            <p class="label <?= $event->featured()->bool() ? '' : 'purple' ?>"><?= $event->detail() ?></p>
                        <?php endif ?>
                        <?= $event->description()->kt() ?>
                        <?php if ($event->link_url()->isNotEmpty()): ?>
                            <a class="btn" href="<?= $event->link_url() ?>"><?= $event->link_text() ?></a>
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</div>