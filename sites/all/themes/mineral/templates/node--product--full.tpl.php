<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <div class="node-row">
    <div class="row">
      <div class="col-xs-12 col-md-4">
        <?php if (count($images)): ?>
        <div class="node-images">
          <div class="images">
            <div id="slider-images" class="slider slider-images outer-pagination">
              <div class="swiper">
                <div class="swiper-wrapper">
                  <?php foreach ($images as $image) {
                    print '<div class="swiper-slide">'  .
                            '<div class="image">' .
                              drupal_render($image) .
                            '</div>' .
                          '</div>';
                  } ?>
                </div>
              </div>
              <?php if (count($images) > 1): ?>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev hide show-md"></div>
                <div class="swiper-button-next hide show-md"></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>

      <div class="col-xs-12 col-md-8">
        <div class="node-header">
          <?php if ($brand != $label): ?>
          <h2><?php print $brand; ?></h2>
          <?php endif; ?>
          <div class="node-title">
            <h1><?php print $label; ?></h1>
            <?php if ($product_info['pdf']): ?>
              <div class="pdf"><a href="<?php print $product_info['pdf']['url']; ?>" download title="<?php print t('Download booklet'); ?>"><i class="icon icon-18"></i></a></div>
            <?php endif; ?>
            <?php if (isset($share_btn)): ?>
              <?php print $share_btn; ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="node-text">
          <?php print render($content['body']); ?>
        </div>

        <div class="node-actions">
          <div class="action"><?php print $product_buy_btn; ?></div>
        </div>
      </div>
    </div>
  </div>

  <?php if(!empty($product_info['descriptions'])): ?>
    <?php foreach ($product_info['descriptions'] as $description): ?>
    <div class="node-row description">
      <div class="row">
        <div class="col-xs-12 col-md-4">
          <div class="label"><?php print $description['label']; ?></div>
        </div>
        <div class="col-xs-12 col-md-8">
          <div class="content"><?php print $description['text']; ?></div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  <?php endif; ?>

  <div class="node-row formulation">
    <div class="row">
      <div class="col-xs-12 col-md-4">
        <div class="label"><?php print t('Formulation'); ?></div>
      </div>
      <div class="col-xs-12 col-md-8">
        <div class="content">
          <?php print $product_info['formulation']['label']; ?>
        </div>
      </div>
    </div>
  </div>

  <?php if (!empty($product_info['components'])): ?>
  <div class="node-row components">
    <div class="row">
      <div class="col-xs-12 col-md-4">
        <div class="label"><?php print t('Components'); ?></div>
      </div>
      <div class="col-xs-12 col-md-8">
        <div class="content">
          <div class="values">
            <?php foreach ($product_info['components'] as $component): ?>
            <div class="component">
              <div class="l1"><?php print $component['label']; ?></div>
              <div class="l2"><?php print $component['value']; ?></div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <?php if (!empty($reglaments_table)): ?>
  <div class="node-row reglaments">
    <div class="row">
      <div class="col-xs-12">
        <div class="label"><?php print t('Reglaments'); ?></div>
      </div>
      <div class="col-xs-12">
        <div class="content">
          <?php print $reglaments_table; ?>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>

</div>
