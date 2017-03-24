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
  $html .= '  <strong>' . $name . '</strong><br />';

  if (!empty($content)){
    $html .= $content;
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

?>
