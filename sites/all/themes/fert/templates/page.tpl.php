<div class="page-wrapper">

  <div class="nav-mobile">
    <div class="branding">
      <div class="logo"><a href="<?php print url('<front>'); ?>"><img src="<?php print $logo; ?>" /></a></div>
    </div>
    <div class="menu-mobile-wr">
      <div>
        <?php if ($primary_nav): print $primary_nav; endif; ?>
        <div class="global menu-mobile-link">
          <div><a href="https://kccc.group" target="_blank" title="KCCC GROUP">KCCC GROUP</a></div>
        </div>
      </div>
      <div>
        <?php if (!empty($language_link_mobile)): ?>
        <div class="language-switch menu-mobile-link"><?php print $language_link_mobile; ?></div>
        <?php endif; ?>
        <?php if ($secondary_nav): print $secondary_nav; endif; ?>
      </div>
    </div>
  </div>

  <div class="<?php print $classes; ?>">
    <?php if ($is_header_on): ?>
    <header class="page-header">
      <div class="header-wr">
        <div class="container">
          <div class="row middle-xs full-height no-wrap">
            <div class="col col-1 full-height col-no-gutter">
              <div class="branding">
                <div class="brand">
                  <div class="ru"><a href="<?php print url('<front>'); ?>">Кирово-Чепецкая Химическая&nbsp;Компания</a></div>
                  <div class="en"><a href="<?php print url('<front>'); ?>">Kirovo-Chepetsk Chemical Company</a></div>
                </div>
                <div class="logo"><a href="<?php print url('<front>'); ?>"><img src="/sites/all/themes/fert/images/logo/logo_kccc_white.png" alt="<?php print t('TH «Kirovo-Chepetsk Chemical Company» LLC'); ?>" /></a></div>
              </div>
            </div>
            <div class="col col-2 full-height col-no-gutter">
              <div class="menu-bkg">
                <div class="nav-mobile-label hide-lg"><div class="label"><div class="icon"></div></div></div>
                <div class="hide-xs show-lg">
                  <div class="menu-wr">
                    <div class="global">
                      <a href="https://kccc.group" target="_blank" title="KCCC GROUP">
                        <i class="icon icon-01"></i>
                      </a>
                    </div>
                    <div class="primary-menu">
                      <?php if ($primary_nav): print $primary_nav; endif; ?>
                    </div>
                    <div class="secondary-menu">
                      <?php if ($secondary_nav): print $secondary_nav; endif; ?>
                    </div>
                    <?php if (!empty($language_link)): ?>
                    <div class="language-switch"><?php print $language_link; ?></div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </header>
    <?php endif; ?>

    <div class="page-content">
      <div class="container">

        <?php if ($page['highlighted'] || $is_banner_on): ?>
        <div class="page-highlighted">

          <?php if (isset($search_form)): ?>
            <div class="search hide show-lg">
              <?php print drupal_render($search_form); ?>
            </div>
          <?php endif; ?>

          <?php if ($page['highlighted']): ?>
            <?php print render($page['highlighted']); ?>
          <?php endif; ?>

          <?php if ($is_banner_on): ?>
          <div class="page-banner">
            <div class="screen-width">
              <div class="image">
                <picture>
                  <?php if (!empty($banner_mobile_url)): ?><source class="mobile" srcset="<?php print $banner_mobile_url; ?>" media="(max-width: <?php print $banner_break; ?>px)"><?php endif; ?>
                  <img src="<?php print $banner_url; ?>" alt="<?php print $banner_title ?? t('Banner'); ?>">
                </picture>
              </div>

              <div class="container full-height">
                <div class="banner-title-wrapper">
                  <?php if (!empty($banner_title_prefix)): ?><div class="banner-prefix"><?php print $banner_title_prefix; ?></div><?php endif; ?>
                  <?php if (!empty($banner_title)): ?><div class="banner-title"><?php print $banner_title; ?></div><?php endif; ?>
                  <?php if (!empty($banner_title_suffix)): ?><div class="banner-suffix"><?php print $banner_title_suffix; ?></div><?php endif; ?>
                </div>
              </div>
              </div>
          </div>
          <?php endif; ?>
        </div>
        <?php else: ?>
        <div class="page-margin"></div>
        <?php endif; ?>

        <?php print $breadcrumb; ?>

        <?php
          $ls = !empty($page['sidebar_first']);
          $rs = !empty($page['sidebar_second']);
        ?>
        <?php if ($ls || $rs): ?>
        <div class="row">
        <?php endif; ?>

        <?php if ($ls): ?>
          <div class="col-xs-12 col-lg-3">
            <div class="page-left">
              <?php print render($page['sidebar_first']); ?>
            </div>
          </div>
        <?php endif; ?>

          <?php if ($ls || $rs): ?>
          <div class="col-xs-12 col-lg-9">
          <?php endif; ?>

            <div class="page-main">
              <?php if (isset($tabs)): ?><?php print render($tabs); ?><?php endif; ?>
              <?php print $messages; ?>
              <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

              <?php if ($is_title_on): ?>
                <div class="page-title">
                  <?php print render($title_prefix); ?>
                  <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
                  <?php print render($title_suffix); ?>
                </div>
              <?php endif; ?>

              <?php print render($page['content']); ?>
            </div>

          <?php if ($ls || $rs): ?>
          </div>
          <?php endif; ?>

          <?php if ($rs): ?>
          <div class="col-xs-12 col-lg-3">
            <div class="page-right">
              <?php print render($page['sidebar_second']); ?>
            </div>
          </div>
          <?php endif; ?>

        <?php if ($ls || $rs): ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($page['downlighted'])): ?>
          <div class="page-downlighted">
            <?php print render($page['downlighted']); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="page-footer">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-4 col-lg-3">
            <div class="b">
              <div class="branding">
                <div class="logo"><a href="<?php print url('<front>'); ?>"><img src="<?php print $logo; ?>" alt="" /></a></div>
                <div class="brand">
                  <div class="ru"><a href="<?php print url('<front>'); ?>">Кирово-Чепецкая Химическая&nbsp;Компания</a></div>
                  <div class="en"><a href="<?php print url('<front>'); ?>">Kirovo-Chepetsk Chemical Company</a></div>
                </div>
              </div>
              <div class="legal-name">
                <?php print t('TH «Kirovo-Chepetsk Chemical Company» LLC'); ?>
              </div>
              <?php if (!empty($phone_reception)): ?>
              <div class="phone">
                <a href="tel:+<?php print $phone_reception['raw']; ?>" class="c0py"><?php print $phone_reception['formatted']; ?></a>
              </div>
              <?php endif;?>
              <?php if (!empty($email_reception)): ?>
              <div class="email">
                <a href="mailto:<?php print $email_reception; ?>" class="c0py"><?php print $email_reception; ?></a>
              </div>
              <?php endif;?>
            </div>
          </div>

          <div class="col-xs-12 col-md-8 col-lg-6">
            <div class="row">
              <div class="col-xs-12 col-md-6">
                <div class="menu about">
                  <div class="title"><?php print t('About us'); ?></div>
                  <ul>
                    <li><a href="https://kccc.ru/o-kompanii" target="_blank"><?php print t('Information', [], ['context' => 'menu']); ?></a></li>
                    <li><a href="https://kccc.ru/otzyvy" target="_blank"><?php print t('Reviews'); ?></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-xs-12 col-md-6">
                <div class="menu contacts">
                  <div class="title"><?php print t('Contacts'); ?></div>
                  <ul>
                    <li><a href="https://kccc.ru/predstaviteli" target="_blank"><?php print t('Regional representatives'); ?></a></li>
                    <li><a href="<?php print url('node/6'); ?>"><?php print t('Contact us'); ?></a></li>
                    <li><a href="https://kccc.ru/filialy" target="_blank"><?php print t('Find us'); ?></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xs-12 col-md-6 hide-md show-lg col-md-offset-3 col-lg-3 col-lg-offset-0">
            <div class="menu">
              <div class="title"><?php print t('Socials'); ?></div>
              <div class="socials">
                <a href="https://vk.com/public147827276" rel="nofollow" target="_blank" title="<?php print t('VK'); ?>"><i class="icon icon-08 hover-raise"></i></a>
                <a href="https://ok.ru/group/54447113371728" rel="nofollow" target="_blank" title="<?php print t('OK'); ?>"><i class="icon icon-09 hover-raise"></i></a>
                <a href="https://youtube.com/@kccc_td" rel="nofollow" target="_blank" title="YouTube"><i class="icon icon-13 hover-raise"></i></a>
                <a href="https://dzen.ru/td_kccc" rel="nofollow" target="_blank" title="<?php print t('Yandex Dzen'); ?>"><i class="icon icon-12 hover-raise"></i></a>
                <a href="https://t.me/tdkccc" rel="nofollow" target="_blank" title="Telegram"><i class="icon icon-10 hover-raise"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="back-to-top"><i class="icon icon-03"></i></div>
  </div>
</div>

