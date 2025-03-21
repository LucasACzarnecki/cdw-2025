<?php
$scheduleBlocks = $page->blocks()->filterBy('type', 'scheduleblock');
$eventBlocks = $page->blocks()->filterBy('type', 'eventblock')->filterBy('pagenav', true);

if ($scheduleBlocks->isNotEmpty() || $eventBlocks->isNotEmpty()):
?>
<section class="grid grid-four gap-3 mb-4 cta-block white-block">
    <?php foreach ($page->blocks()->toBlocks() as $block): ?>
        <?php if ($block->type() == 'scheduleblock'): ?>
            <div class="grid grid-one gap-05">
                <h3 class="label sm"><?= $block->datetime() ?></h3>
                <ul>
                    <?php foreach ($block->events()->toStructure() as $event): ?>
                        <li>
                            <a class="tight" href="#<?= $event->event()->toPage()->slug() ?>">
                                <?= $event->event()->toPage()->title() ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <?php if ($block->type() == 'eventblock' && $block->pagenav()->isTrue()): ?>
            <div class="grid grid-one gap-05">
                <h3 class="label sm"><?= $block->header()->isNotEmpty() ? $block->header() : $block->datetime() ?></h3>
                <ul>
                    <?php foreach ($block->events()->toStructure() as $event): ?>
                        <li>
                            <a class="tight" href="#<?= $event->id() ?>">
                                <?= $event->title()->html() ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</section>
<?php endif ?>