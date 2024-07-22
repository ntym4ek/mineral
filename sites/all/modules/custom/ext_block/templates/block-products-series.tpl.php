<?php
?>
<div class="block-products-series">

  <div class="screen-width">
    <div class="section-title invert">
      <div><?php print $title; ?></div>
      <div class="underline"></div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">

      <div id="carousel-series" class="carousel carousel-series outer-pagination top-pagination no-mobile-frame" data-slidesperview-xs="1" data-pagination-custom-text="true">
        <div class="swiper">
          <div class="swiper-wrapper">

            <?php foreach ($cards as $index => $card): ?>
              <div class="swiper-slide" data-bullet-label="<?php print $card['label']; ?>">

                <div id="carousel-products-<?php print $index; ?>" class="carousel carousel-products outer-navigation no-mobile-frame" data-nested="true" data-slidesperview-xs="1" data-slidesperview-md="2" data-slidesperview-lg="3" data-slidesperview-xl="4">
                  <div class="swiper">
                    <div class="swiper-wrapper">
                      <?php foreach ($card['products'] as $html) {
                        print '<div class="swiper-slide">'  . $html . '</div>';
                      } ?>
                    </div>
                  </div>

                  <div class="swiper-button-prev hide show-xl"></div>
                  <div class="swiper-button-next hide show-xl"></div>
                </div>

              </div>
            <?php endforeach; ?>

          </div>
        </div>
        <div class="swiper-pagination mobile-menu-disabled"></div>
      </div>
    </div>
  </div>
</div>
