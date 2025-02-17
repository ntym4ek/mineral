<?php

function mineral_preprocess_page(&$vars)
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

  // -- Переключатель языка
  $path = drupal_is_front_page() ? '<front>' : $_GET['q'];
  if ($links = language_negotiation_get_switch_links('language', $path)) {
    $lang = $GLOBALS["language"]->language == 'ru' ? 'en' : 'ru';
    $vars['language_link'] = l('<i class="icon icon-02"></i>', $links->links[$lang]['href'], $links->links[$lang] + ['html' => TRUE]);
    $vars['language_link_mobile'] = l($lang == 'en' ? 'English' : 'Русский', $links->links[$lang]['href'], $links->links[$lang]);
  }
}

/**
 * Implements hook_theme().
 */
function mineral_theme()
{
  return [
    'share_btn' => [
      'variables' => ['url' => null, 'title' => null, 'text' => null],
      'template' => 'templates/share-btn',
    ],
  ];
}

function mineral_preprocess_mimemail_message(&$vars)
{
  // переменные для шаблона письма
  $vars['site_name'] = ''; // не выводить название сайта в заголовке, оно на логотипе
}

/**
 * -- Переопределение функций темизации ----------------------------------------
 */
function mineral_current_search_link_active($vars)
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
  $vars['options']['attributes']['class'][] = 'btn btn-xs btn-brand btn-with-icon-left btn-uppercase';
  $vars['options']['attributes']['title'] = t('Remove this filter');
  return l($vars['text'], $vars['path'], $vars['options']);
}

function mineral_current_search_deactivate_widget($vars)
{
  return 'x&nbsp;&nbsp;';
}

function mineral_facetapi_title($vars)
{
  // Сделать заголовки блоков фасетных фильтров мультиязычными
  if ($vars["facet"]["#settings"]->facet == 'field_item_category') {
    return t('Category');
  }
  if ($vars["facet"]["#settings"]->facet == 'field_item_brand') {
    return t('Brand');
  }
}
