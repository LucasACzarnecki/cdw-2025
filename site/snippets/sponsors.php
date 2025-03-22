<section id="sponsors" class="grid grid-one gap-4 mb-10 cta-block purple-block torn-paper">
<div class="grid grid-four gap-3">
        <h2>Hosted by</h2>
        <div class="grid grid-one gap-3 span-3">
            <?php
            // Check if large_logos field is not empty
            if ($site->host_logos()->isNotEmpty()) {
            ?>
                <div class="grid grid-three logos gap-3">
                    <?php foreach ($site->host_logos()->toFiles() as $logo): ?>
                        <?php $widthStyle = $logo->customwidth()->isNotEmpty() ? 'style="width: ' . $logo->customwidth() . '%;"' : ''; ?>
                        <?php if ($logo->link()->isNotEmpty()): ?>
                            <a href="<?= $logo->link() ?>" target="_blank" style="width: 100%;">
                                <img src="<?= $logo->url() ?>" alt="<?= $logo->alt() ?>" <?= $widthStyle ?>>
                            </a>
                        <?php else: ?>
                            <img src="<?= $logo->url() ?>" alt="<?= $logo->alt() ?>" <?= $widthStyle ?>>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="grid grid-four gap-3">
        <h2>Sponsored by</h2>
        <div class="grid grid-one gap-3 span-3">
            <?php
            // Check if large_logos field is not empty
            if ($site->large_logos()->isNotEmpty()) {
            ?>
                <div class="grid grid-three logos gap-3">
                    <?php foreach ($site->large_logos()->toFiles() as $logo): ?>
                        <?php $widthStyle = $logo->customwidth()->isNotEmpty() ? 'style="width: ' . $logo->customwidth() . '%;"' : ''; ?>
                        <?php if ($logo->link()->isNotEmpty()): ?>
                            <a href="<?= $logo->link() ?>" target="_blank" style="width: 100%;">
                                <img src="<?= $logo->url() ?>" alt="<?= $logo->alt() ?>" <?= $widthStyle ?>>
                            </a>
                        <?php else: ?>
                            <img src="<?= $logo->url() ?>" alt="<?= $logo->alt() ?>" <?= $widthStyle ?>>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            <?php } ?>
            <?php
            // Check if medium_logos field is not empty
            if ($site->medium_logos()->isNotEmpty()) {
            ?>

                <div class="grid grid-four logos gap-3">
                    <?php foreach ($site->medium_logos()->toFiles() as $logo): ?>
                        <?php $widthStyle = $logo->customwidth()->isNotEmpty() ? 'style="width: ' . $logo->customwidth() . '%;"' : ''; ?>
                        <?php if ($logo->link()->isNotEmpty()): ?>
                            <a href="<?= $logo->link() ?>" target="_blank" style="width: 100%;">
                                <img src="<?= $logo->url() ?>" alt="<?= $logo->alt() ?>" <?= $widthStyle ?>>
                            </a>
                        <?php else: ?>
                            <img src="<?= $logo->url() ?>" alt="<?= $logo->alt() ?>" <?= $widthStyle ?>>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            <?php } ?>
            <?php
            // Check if small_logos field is not empty
            if ($site->small_logos()->isNotEmpty()) {
            ?>
                <div class="grid grid-three logos gap-3">
                    <?php foreach ($site->small_logos()->toFiles() as $logo): ?>
                        <?php $widthStyle = $logo->customwidth()->isNotEmpty() ? 'style="width: ' . $logo->customwidth() . '%;"' : ''; ?>
                        <?php if ($logo->link()->isNotEmpty()): ?>
                            <a href="<?= $logo->link() ?>" target="_blank" style="width: 100%;">
                                <img src="<?= $logo->url() ?>" alt="<?= $logo->alt() ?>" <?= $widthStyle ?>>
                            </a>
                        <?php else: ?>
                            <img src="<?= $logo->url() ?>" alt="<?= $logo->alt() ?>" <?= $widthStyle ?>>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>