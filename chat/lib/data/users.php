<?php
/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license Modified MIT License
 * @link https://blueimp.net/ajax/
 */

// List containing the registered chat users:
$users = array();

// Default guest user (don't delete this one):
$users[0] = array();
$users[0]['userRole'] = AJAX_CHAT_GUEST;
$users[0]['userName'] = null;
$users[0]['password'] = null;
$users[0]['channels'] = array(0);

// Sample admin user:
$users[1] = array();
$users[1]['userRole'] = AJAX_CHAT_ADMIN;
$users[1]['userName'] = 'admin';
$users[1]['password'] = 'admin';
$users[1]['channels'] = array(0,1);

// Superuser admin:
$users[2] = array();
$users[2]['userRole'] = AJAX_CHAT_ADMIN;
$users[2]['userName'] = 'superadmin';
$users[2]['password'] = 'superadmin';
$users[2]['channels'] = array(0,1);

// Poobah admin:
$users[3] = array();
$users[3]['userRole'] = AJAX_CHAT_ADMIN;
$users[3]['userName'] = 'poobah_admin';
$users[3]['password'] = 'poobah';
$users[3]['channels'] = array(0,1);

// Sample moderator user:
$users[4] = array();
$users[4]['userRole'] = AJAX_CHAT_MODERATOR;
$users[4]['userName'] = 'moderator';
$users[4]['password'] = 'moderator';
$users[4]['channels'] = array(0,1);

// Superuser moderator user:
$users[5] = array();
$users[5]['userRole'] = AJAX_CHAT_MODERATOR;
$users[5]['userName'] = 'supermoderator';
$users[5]['password'] = 'supermoderator';
$users[5]['channels'] = array(0,1);

// Poobah moderator user:
$users[6] = array();
$users[6]['userRole'] = AJAX_CHAT_MODERATOR;
$users[6]['userName'] = 'poobah_moderator';
$users[6]['password'] = 'poobah';
$users[6]['channels'] = array(0,1);

// Superuser registered user:
$users[7] = array();
$users[7]['userRole'] = AJAX_CHAT_USER;
$users[7]['userName'] = 'superuser';
$users[7]['password'] = 'superuser';
$users[7]['channels'] = array(0,1);

// Poobah registered user:
$users[8] = array();
$users[8]['userRole'] = AJAX_CHAT_USER;
$users[8]['userName'] = 'poobah_user';
$users[8]['password'] = 'poobah';
$users[8]['channels'] = array(0,1);

// Sample registered user:
$users[9] = array();
$users[9]['userRole'] = AJAX_CHAT_USER;
$users[9]['userName'] = 'superuser';
$users[9]['password'] = 'superuser';
$users[9]['channels'] = array(0,1);


