<?php
/**
 * Elgg user tools settings
 *
 * @package Elgg
 * @subpackage Core
 */

// Only logged in users
elgg_gatekeeper();

// Make sure we don't open a security hole ...
if ((!elgg_get_page_owner_entity()) || (!elgg_get_page_owner_entity()->canEdit())) {
	register_error(elgg_echo('noaccess'));
	forward('/');
}

$title = elgg_echo("usersettings:plugins");

$content = elgg_view("core/settings/tools",
	array('installed_plugins' => elgg_get_plugins()));

$params = array(
	'content' => $content,
	'title' => $title,
);
$body = elgg_view_layout('one_sidebar', $params);

echo elgg_view_page($title, $body);
