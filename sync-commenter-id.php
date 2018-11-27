<?php
/*
Plugin Name: Sync Commenter ID
Plugin URI: https://github.com/dchenk/sync-commenter-id
Description: Automatically have comment user ID updated when commenter email changes.
Author: Wider Webs
Version: 1.0
Author URI: https://github.com/dchenk
*/

if (!defined('ABSPATH')) {
	exit;
}

function sync_commenter_id($comment) {
	if (!empty($comment['comment_author_email'])) {
		$u = get_user_by('email', $comment['comment_author_email']);
		if ($u) {
			$comment['user_ID'] = $u->ID;
		}
	}
	return $comment;
}
add_filter('preprocess_comment' , 'sync_commenter_id');

