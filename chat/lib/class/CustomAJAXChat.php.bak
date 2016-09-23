<?php
/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license Modified MIT License
 * @link https://blueimp.net/ajax/
 */

class CustomAJAXChat extends AJAXChat {

	// Returns an associative array containing userName, userID and userRole
	// Returns null if login is invalid
	function getValidLoginUserData() {

		$customUsers = $this->getCustomUsers();

		if($this->getRequestVar('password')) {
			// Check if we have a valid registered user:

			$userName = $this->getRequestVar('userName');
			$userName = $this->convertEncoding($userName, $this->getConfig('contentEncoding'), $this->getConfig('sourceEncoding'));

			$password = $this->getRequestVar('password');
			$password = $this->convertEncoding($password, $this->getConfig('contentEncoding'), $this->getConfig('sourceEncoding'));

			foreach($customUsers as $key=>$value) {
				if(($value['userName'] == $userName) && ($value['password'] == $password)) {
					$userData = array();
					$userData['userID'] = $key;
					$userData['userName'] = $this->trimUserName($value['userName']);
					$userData['userRole'] = $value['userRole'];
					return $userData;
				}
			}

			return null;
		} else {
			// Guest users:
			return $this->getGuestUser();
		}
	} // End getValidLoginUserData

	// Store the channels the current user has access to
	// Make sure channel names don't contain any whitespace
	function &getChannels() {
		if($this->_channels === null) {
			$this->_channels = array();

			$customUsers = $this->getCustomUsers();
			
			// Get the channels, the user has access to:
			if($this->getUserRole() == AJAX_CHAT_GUEST) {
				$validChannels = $customUsers[0]['channels'];
			} else {
				$validChannels = $customUsers[$this->getUserID()]['channels'];
			}
			
			// Add the valid channels to the channel list (the defaultChannelID is always valid):
			foreach($this->getAllChannels() as $key=>$value) {
				if ($value == $this->getConfig('defaultChannelID')) {
					$this->_channels[$key] = $value;
					continue;
				}
				// Check if we have to limit the available channels:
				if($this->getConfig('limitChannelList') && !in_array($value, $this->getConfig('limitChannelList'))) {
					continue;
				}
				if(in_array($value, $validChannels)) {
					$this->_channels[$key] = $value;
				}
			}
		}
		return $this->_channels;
	} // End &getChannels

	// Store all existing channels
	// Make sure channel names don't contain any whitespace
	function &getAllChannels() {
		if($this->_allChannels === null) {
			// Get all existing channels:
			$customChannels = $this->getCustomChannels();
			
			$defaultChannelFound = false;
			
			foreach($customChannels as $name=>$id) {
				$this->_allChannels[$this->trimChannelName($name)] = $id;
				if($id == $this->getConfig('defaultChannelID')) {
					$defaultChannelFound = true;
				}
			}
			
			if(!$defaultChannelFound) {
				// Add the default channel as first array element to the channel list
				// First remove it in case it appeard under a different ID
				unset($this->_allChannels[$this->getConfig('defaultChannelName')]);
				$this->_allChannels = array_merge(
					array(
						$this->trimChannelName($this->getConfig('defaultChannelName'))=>$this->getConfig('defaultChannelID')
					),
					$this->_allChannels
				);
			}
		}
		return $this->_allChannels;
	} // End &getAllChannels

	function &getCustomUsers() {
		// List containing the registered chat users:
		$users = null;
		require(AJAX_CHAT_PATH.'lib/data/users.php');
		return $users;
	} // End &getCustomUsers
	
	function getCustomChannels() {
		// List containing the custom channels:
		$channels = null;
		require(AJAX_CHAT_PATH.'lib/data/channels.php');
		// Channel array structure should be:
		// ChannelName => ChannelID
		return array_flip($channels);
	} //End getCustomChannels

    // This is where we can start adding custom commands
    function parseCustomCommands($text, $textParts) {
    	switch($textParts[0]) {
    	// Away from keyboard message:
    	case '/away':
    		$this->insertChatBotMessage($this->getChannel(), $this->getLoginUserName().' has set their status to Away');
    		$this->setUserName($this->getLoginUserName().'[Away]');
    		$this->updateOnlineList();
    		$this->addInfoMessage($this->getUserName(), 'userName');
    		return true;
    	case '/online':
    	case '/back':
    		$this->insertChatBotMessage($this->getChannel(), $this->getLoginUserName().' has set their status to Online');
    		$this->setUserName($this->getLoginUserName());
    		$this->updateOnlineList();
    		$this->addInfoMessage($this->getUserName(), 'userName');
    		return true;
    	case '/trout':
    	case '/slap':
		$this->insertChatBotMessage($this->getChannel(), $this->getLoginUserName().' slaps '.implode(' ', array_slice($textParts, 1)).' with a wet trout');
    		return true;
    	case '/status':
    		$this->insertChatBotMessage($this->getChannel(), $this->getLoginUserName().' has set their status to '.implode(' ', array_slice($textParts, 1)));
    		$this->setUserName($this->getLoginUserName().'['.implode(' ', array_slice($textParts, 1)).']');
    		$this->updateOnlineList();
    		$this->addInfoMessage($this->getUserName(), 'userName');
    		return true;


    	} // End of switch
    } // End of parseCustomCommands



  // DO NOT PUT ANYTHING BEYOND THIS POINT!
} // End CustomAJAXChat extends AJAXChat {
