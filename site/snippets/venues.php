<?php if (!empty($venues)): ?>
    <section id="venues" class="mb-10 grid grid-four gap-1 torn-paper purple-block cta-block">
    <h2><?= count($venues) > 1 ? 'Venues' : 'Venue' ?></h2>
        <div class="grid grid-three gap-2 span-3">
            <?php foreach ($venues as $venueName): ?>
                <?php $venue = site()->venues()->toStructure()->filterBy('name', $venueName)->first(); ?>
                <?php if ($venue): ?>
                    <div class="span-2">
                    <?php if ($venue->image()->isNotEmpty() && $file = $venue->image()->toFile()): ?>
                            <img src="<?= $file->crop(1200,800)->url() ?>" alt="<?= $venue->name() ?>">
                        <?php endif ?>
                        </div>
                    <div class="grid grid-one gap-05">
                        <h2><?= $venue->name() ?></h2>
                        <p class="label yellow"><?= $venue->address() ?></p>
                        <p><?= $venue->description() ?></p>
                        
                        </div>
                <?php endif ?>
            <?php endforeach ?>
            </div>
    </section>
<?php else: ?>
    <p>No venues available.</p>
<?php endif ?>