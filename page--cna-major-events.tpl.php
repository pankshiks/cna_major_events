
<!--.page -->
<div role="document" class="page">

  <!--.l-header region -->
  <header role="banner" class="l-header">

    <?php if ($top_bar): ?>
      <!--.top-bar -->
      <?php if ($top_bar_classes): ?>
      <div class="<?php print $top_bar_classes; ?>">
      <?php endif; ?>
        <nav class="top-bar"<?php print $top_bar_options; ?>>
          <ul class="title-area">
            <li class="name">
              <h1>
                <span class="top-bar-title-one"><?php print $linked_site_name; ?></span>
                <span class="top-bar-title-two"><a href="<?php url('<front>'); ?>/">CNA</a></span>
              </h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span><?php print $top_bar_menu_text; ?></span></a></li>
          </ul>
          <section class="top-bar-section">
            <?php if ($top_bar_main_menu) :?>
              <?php print $top_bar_main_menu; ?>
            <?php endif; ?>
            <?php if ($top_bar_secondary_menu) :?>
              <?php print $top_bar_secondary_menu; ?>
            <?php endif; ?>
          </section>
        </nav>
      <?php if ($top_bar_classes): ?>
      </div>
      <?php endif; ?>
      <!--/.top-bar -->
    <?php endif; ?>

    <!-- Title, slogan and menu -->
    <?php if ($alt_header): ?>
    <div class="logo-area-wrapper">
      <section class="row <?php print $alt_header_classes; ?>">
        <div class="columns large-12">

          <?php if (!empty($page['header'])): ?>
            <div>
              <?php print render($page['header']); ?>
            </div>
          <?php endif; ?>

        </div>
      </section>
    </div>
    <?php endif; ?>

  </header>
  <!--/.l-header -->

  <!-- Main menu -->
  <?php if ($alt_main_menu || $alt_secondary_menu): ?>
  <div class="main-menu-wrapper hide-for-small">
    <section class="row">
      <div class="columns large-12">

        <?php if ($alt_main_menu): ?>
          <nav id="main-menu" class="navigation" role="navigation">
            <?php
              $menu_name = variable_get('menu_main_links_source', 'main-menu');
              $tree = menu_tree($menu_name);
              print drupal_render($tree);
            ?>
            <div class="search-link-wrapper">
              <a href="/search" class="search-link <?php print cna_link_active_class('/search/node') ;?>" title="Search Our Content"><i class="fa fa-search"></i></a>
            </div>
            <div class="search-box element-hidden"><?php print $search_box; ?></div>
          </nav> <!-- /#main-menu -->
        <?php endif; ?>

      </div>
    </section>
  </div>
  <?php endif; ?>

  <?php if (!empty($page['user1']) && user_is_logged_in()): ?>
    <div class="secondary-menu-wrapper hide-for-small">
      <section class="row">
        <div class="columns large-12">
          <nav id="secondary-menu" class="navigation" role="navigation">
            <?php print render($page['user1']); ?>
          </nav>
        </div>
      </section>
    </div>
  <?php endif; ?>

  

  

  <?php if (!empty($page['help'])): ?>
    <!--/.l-help -->
    <section class="l-help row">
      <div class="large-12 columns">
        <?php print render($page['help']); ?>
      </div>
    </section>
    <!--/.l-help -->
  <?php endif; ?>

  <!--/.main content -->  
    <?php if (!empty($page['highlighted'])): ?>
      <div class="highlight panel callout">
        <?php print render($page['highlighted']); ?>
      </div>
    <?php endif; ?>

    <a id="main-content"></a>

    <?php if ($breadcrumb): print $breadcrumb; endif; ?>

    <?php if ($title /*&& !$is_front*/): ?>
      <?php print render($title_prefix); ?>
      <h1 id="page-title" class="title"><?php print $title; ?></h1>
      <?php print render($title_suffix); ?>
    <?php endif; ?>

    <?php if (!empty($tabs)): ?>
      <?php print render($tabs); ?>
      <?php if (!empty($tabs2)): print render($tabs2); endif; ?>
    <?php endif; ?>

    <?php if ($action_links): ?>
      <ul class="action-links">
        <?php print render($action_links); ?>
      </ul>
    <?php endif; ?>

    <?php print render($page['content']); ?>
  <!--/.main content -->

  <?php if (!empty($page['footer_firstcolumn']) || !empty($page['footer_secondcolumn']) || !empty($page['footer_thirdcolumn']) || !empty($page['footer_fourthcolumn'])): ?>
    <!--.footer-columns -->
    <section class="row l-footer-columns">
      <?php if (!empty($page['footer_firstcolumn'])): ?>
        <div class="footer-first large-3 columns">
          <?php print render($page['footer_firstcolumn']); ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['footer_secondcolumn'])): ?>
        <div class="footer-second large-3 columns">
          <?php print render($page['footer_secondcolumn']); ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['footer_thirdcolumn'])): ?>
        <div class="footer-third large-3 columns">
          <?php print render($page['footer_thirdcolumn']); ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['footer_fourthcolumn'])): ?>
        <div class="footer-fourth large-3 columns">
          <?php print render($page['footer_fourthcolumn']); ?>
        </div>
      <?php endif; ?>
    </section>
    <!--/.footer-columns-->
  <?php endif; ?>

  <!-- footersub -->
  <?php if (!empty($page['footersub_firstcolumn']) || !empty($page['footersub_secondcolumn'])): ?>
    <section class="footersub-wrapper">
      <div class="l-footersub row">
        <div class="small-12 medium-12 large-6 columns footersub_firstcolumn"><?php print render($page['footersub_firstcolumn']); ?></div>
        <div class="small-12 medium-12 large-6 columns footersub_secondcolumn text-right"><?php print render($page['footersub_secondcolumn']); ?></div>
      </div>
    </section>
  <?php endif; ?>

  <!--.l-footer-->
  <?php if (!empty($page['footer'])): ?>
  <footer class="footer-wrapper">
    <div class="l-footer row" role="contentinfo">
      <?php print render($page['footer']); ?>
    </div>
  </footer>
  <?php endif; ?>
  <!--/.footer-->

  <?php if ($messages && $zurb_foundation_messages_modal): print $messages; endif; ?>
</div>
<!--/.page -->
