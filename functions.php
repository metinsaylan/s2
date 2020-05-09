<?php 

add_action('wp_head', 'inline_css');
function inline_css() {
  ?><style><?php include_once( 'inline.css' ); ?></style><?php
}
