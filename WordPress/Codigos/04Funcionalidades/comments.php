<?php 
$ol = '<ol class="comments-list">%s</ol>';
printf( $ol, wp_list_comments() );

$args = array('comment_notes_after' => '' );
comment_form($args);