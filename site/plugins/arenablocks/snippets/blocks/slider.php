<?php
$images = $block->images()->toFiles();
$sliderLabel = $block->sliderLabel()->html();
$sliderTitle = $block->sliderTitle()->html();
if ($images->isNotEmpty()): ?>

            <div class="row sliderControls mb-4">
                <div class="col-8">
                    <h5><?= $sliderLabel ?></h5>
                    <h2><?= $sliderTitle ?></h2>
                </div>
                <div class="col-4 text-end">
                    <button id="prevButton" class="btn">
                        <?= asset('assets/images/SVG/left-arrow.svg')->read() ?>
                    </button>
                    <button id="nextButton" class="btn">
                        <?= asset('assets/images/SVG/right-arrow.svg')->read() ?>
                    </button>
                </div>
            </div>
        <?php snippet('slider', ['images' => $images]) ?>
<?php endif; ?>