<footer>

  <div class="grid gap-2 grid-four sans light mt-3 mb-6">
    <div class="grid grid-one gap-05">
      <h3><a href="<?= url() ?>">Charlottesville Design Week</a></h3>
      <p>Including a range of design disciplines, this week of mostly free events brings together our creative community.</p>
    </div>
    <div id="insta">
      
        <p>Follow Tuesday&nbsp;Design&nbsp;Society <a href="https://www.instagram.com/tuesdaydesignsociety/" target="_blank">on Instagram</a> for updates.</p>
    </div>
   
    <div id="meetup">
    <p>Come join us every Tuesday at&nbsp;<a href="https://www.meetup.com/TuesdayDesign/" title="TDS Meetup" target="_blank">our&nbsp;weekly&nbsp;meetup</a>!</p>
  </div>
  <div id="email">
      <form action="https://charlottesvilledesignweek.us2.list-manage.com/subscribe/post?u=ca02d2d3caaedf19d40ad03d7&amp;id=d4e3aeea98&amp;f_id=004d4fe0f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <p id="signup">Sign up for email updates about CDW&nbsp;2025!</p>
        <input type="email" value="" name="EMAIL" class="required email" aria-label="Email signup" id="mce-EMAIL" required><input  class="btn" type="submit" value="Subscribe" aria-label="Submit">
        <div hidden="true"><input type="hidden" name="tags" value="1301994"></div>
      </form>
    </div>
  </div>
  <label>&copy; 2025 Tuesday Design Society. All rights reserved.</label>


</footer>

<!-- SCRIPTS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

<script>
  let slider = tns({
    container: '.carousel',
    items: 1,
    slideBy: 1,
    gutter: '10',
    autoplay: true,
    autoplayButtonOutput: false,
    autoplayTimeout: 3000,
    speed: 500,
    mouseDrag: true,
    swipeAngle: 45,
    nav: false,
    controls: false,
    responsive: {
      800: {
        items: 2
      },
      1000: {
        items: 3
      },
      1600: {
        items: 4
      }
    }
  });
</script>
<script src="https://www.eventbrite.com/static/widgets/eb_widgets.js"></script>

<script type="text/javascript">
  var exampleCallback = function() {
    console.log('Order complete!');
  };

  window.EBWidgets.createWidget({
    // Required
    widgetType: 'checkout',
    eventId: '<?= $site->eventbrite_code()->html() ?>',
    iframeContainerId: 'eventbrite-widget-container-<?= $site->eventbrite_code()->html() ?>',

    // Optional
    iframeContainerHeight: 1200, // Widget height in pixels. Defaults to a minimum of 625px if not provided
    onOrderComplete: exampleCallback // Method called when an order has successfully completed
  });
</script>


</body>
<script src="assets/js/scripts.js" defer></script>
</html>