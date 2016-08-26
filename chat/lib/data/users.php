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

// Sample moderator user:
$users[4] = array();
$users[4]['userRole'] = AJAX_CHAT_MODERATOR;
$users[4]['userName'] = 'moderator';
$users[4]['password'] = 'moderator';
$users[4]['channels'] = array(0,1);

// Sample registered user:
$users[9] = array();
$users[9]['userRole'] = AJAX_CHAT_USER;
$users[9]['userName'] = 'superuser';
$users[9]['password'] = 'superuser';
$users[9]['channels'] = array(0,1);


