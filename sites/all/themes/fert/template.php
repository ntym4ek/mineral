<?php

function fert_preprocess_page(&$vars)
{
  // -- Главная
  if (drupal_is_front_page()) {

    // не выводить заголовок
    drupal_set_title('');
    $vars['is_title_on'] = false;

    drupal_add_html_head([
      '#tag' => 'meta',
      '#attributes' => [
        'name' => 'description',
        'content' => $vars['site_slogan'],
      ],
    ], 'description');
  } else {
    if (strpos($_GET['q'], 'taxonomy/term') === 0) {
      $term_id = str_replace('taxonomy/term/', '', $_GET['q']);
      if (is_numeric($term_id) && $term_info = helper_get_term_info($term_id)) {
        // вывести слоган для страницы Брендов
        if ($term_info['voc']['name'] == 'brands') {
          $vars['banner_title'] = $term_info['label'];
        }
      }
    }

  }
}

/**
 * -- Переопределение функций темизации ----------------------------------------
 */

function fert_current_search_link_active($vars)
{
  // Sanitizes the link text if necessary.
  $sanitize = empty($vars['options']['html']);
  $link_text = ($sanitize) ? check_plain($vars['text']) : $vars['text'];

  // Builds link, passes through t() which gives us the ability to change the
  // position of the widget on a per-language basis.
  $replacements = array(
    '!current_search_deactivate_widget' => theme('current_search_deactivate_widget', $vars),
  );
  $vars['text'] = t('!current_search_deactivate_widget', $replacements) . $link_text;
  $vars['options']['html'] = TRUE;
  $vars['options']['attributes']['class'][] = 'active';
  $vars['options']['attributes']['class'][] = 'btn btn-badge btn-brand btn-with-icon-left btn-uppercase';
  $vars['options']['attributes']['title'] = t('Remove this filter');
  return l($vars['text'], $vars['path'], $vars['options']);
}

function fert_current_search_deactivate_widget($vars)
{
  return 'x&nbsp;&nbsp;';
}

function fert_facetapi_title($vars)
{
  // Сделать заголовки блоков фасетных фильтров мультиязычными
  if ($vars["facet"]["#settings"]->facet == 'field_item_category') {
    return t('Category');
  }
  if ($vars["facet"]["#settings"]->facet == 'field_item_brand') {
    return t('Brand');
  }
}
