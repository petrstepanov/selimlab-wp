<?php

function person_shortcode( $atts, $content = null ) {
  $a = shortcode_atts( array(
    'name' => '',
    'avatar_url' => '',
    'email' => '',
    'rg' => '',
    'linkedin' => '',
  ), $atts );

  $name       = esc_attr($a['name']);
  $avatar_url = esc_attr($a['avatar_url']);
  $details    = esc_attr($a['details']);
  $email      = esc_attr($a['email']);
  $rg         = esc_attr($a['rg']);
  $linkedin   = esc_attr($a['linkedin']);

  if (empty($name)) return '';

  $html = '<figure class="col-sm-6 col-md-4 col-lg-3">';

  if (!empty($avatar_url)){
    $html .= '<img class="full-width" src="' . $avatar_url . '" alt="' . $name . '" />';
  }

  $html .= '<figcaption>';
  $html .= '  <p><strong>' . $name . '</strong></p>';

  if (!empty($content)){
    $html .= '<p><small>' . $content . '</small></p>';
  }

  $html .= '<p class="person-details">';

    if (!empty($rg)){
      $html .= '<a title="' . $name . ' on ResearchGate" href="' . $rg .'" target="_blank" rel="nofollow"><img class="icon" src="' . get_template_directory_uri() . '/img/researchgate-icon.svg" /></a>';
    }
    if (!empty($linkedin)){
      $html .= '<a title="' . $name . ' on LinkedIn" href="' . $linkedin .'" target="_blank" rel="nofollow"><img class="icon" src="' . get_template_directory_uri() . '/img/linkedin-icon.svg" /></a>';
    }
    if (!empty($email)){
      $html .= '<a class="email" href="mailto:' . $email . '">' . $email . '</a>';
    }

  $html .= '</p></figcaption></figure>';

  return $html;
}

add_shortcode('person', 'person_shortcode');

function pi_shortcode( $atts, $content = null ) {
  $a = shortcode_atts( array(
    'name' => '',
    'avatar_url' => '',
    'email' => '',
    'rg' => '',
    'linkedin' => '',
  ), $atts );

  $name       = esc_attr($a['name']);
  $avatar_url = esc_attr($a['avatar_url']);
  $details    = esc_attr($a['details']);
  $email      = esc_attr($a['email']);
  $rg         = esc_attr($a['rg']);
  $linkedin   = esc_attr($a['linkedin']);

  if (empty($name)) return '';

  $html  = '<figure class="row">';

  if (!empty($avatar_url)){
    $html .= '<div class="col-sm-6 col-md-4 col-lg-3">';
    $html .= '  <img class="full-width" src="' . $avatar_url . '" alt="' . $name . '" />';
    $html .= '</div>';
  }

  $html .= '<figcaption class="col-sm-6 col-md-8 col-lg-9">';
  $html .= '  <p><strong>' . $name . '</strong></p>';

  if (!empty($content)){
    $html .= '<p>' . $content . '</p>';
  }

  $html .= '<p class="person-details">';

    if (!empty($rg)){
      $html .= '<a title="' . $name . ' on ResearchGate" href="' . $rg .'" target="_blank" rel="nofollow"><img class="icon" src="' . get_template_directory_uri() . '/img/researchgate-icon.svg" /></a>';
    }
    if (!empty($linkedin)){
      $html .= '<a title="' . $name . ' on LinkedIn" href="' . $linkedin .'" target="_blank" rel="nofollow"><img class="icon" src="' . get_template_directory_uri() . '/img/linkedin-icon.svg" /></a>';
    }
    if (!empty($email)){
      $html .= '<a class="email" href="mailto:' . $email . '">' . $email . '</a>';
    }

  $html .= '</p></figcaption></figure>';

  return $html;
}

add_shortcode('pi', 'pi_shortcode');

function event_shortcode( $atts, $content = null ) {
  $a = shortcode_atts( array(
    'heading' => '',
    'subhead' => '',
    'img_url' => '',
  ), $atts );

  $heading = esc_attr($a['heading']);
  $subhead = esc_attr($a['subhead']);
  $img_url = esc_attr($a['img_url']);

  $html  = '<h3>' . $heading . '<br/><small>' . $subhead . '</small></h3>';
  $html .= '<figure><img class="full-width" src="' . $img_url . '" alt="' . $heading . ' ' . $subhead . '" />';

  if (!empty($content)){
    $html .= '<figcaption>' . $content . '</figcaption>';
  }

  $html .= '</figure>';

  return $html;
}

add_shortcode('event', 'event_shortcode');

add_shortcode('pi', 'pi_shortcode');

function pic_shortcode( $atts, $content = null ) {
  $a = shortcode_atts( array(
    'img_url' => '',
    'alt' => '',
  ), $atts );

  $img_url = esc_attr($a['img_url']);
  $alt     = esc_attr($a['alt']);

  $html  = '<figure class="col-sm-6 col-md-4 col-lg-3">';
  $html .= '<img class="full-width" src="' . $img_url . '" alt="' . $alt . '" />';

  if (!empty($content)){
    $html .= '<figcaption><small>' . $content . '</small></figcaption>';
  }

  $html .= '</figure>';

  return $html;
}

add_shortcode('pic', 'pic_shortcode');

?>
