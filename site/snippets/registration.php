<section id="register" class="grid grid-one gap-3 mb-6 cta-block white-block">
    <h2>Register</h2>
    <?php
    // Determine the Eventbrite code
    $eventbriteCode = $page->eventbrite_code()->isNotEmpty() 
        ? $page->eventbrite_code()->html() 
        : $site->eventbrite_code()->html();
    ?>
    <div id="eventbrite-widget-container-<?= $eventbriteCode ?>"></div>
</section>