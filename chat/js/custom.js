/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license Modified MIT License
 * @link https://blueimp.net/ajax/
 */

// Overriding client side functionality:

/*
// Example - Overriding the replaceCustomCommands method:
ajaxChat.replaceCustomCommands = function(text, textParts) {
	return text;
}
 */

// Announce Channel Information
// Return true to override built-in info message processing, return false to use your override and skip the built in handler
ajaxChat.handleCustomInfoMessage = function(infoType, infoData) {
	switch(infoType) {
		case 'channelID':
			this.channelID = infoData;
			if (this.channelID == 0)
				this.addChatBotMessageToChatList('Welcome to the Public room. Please follow the rules.');
			if (this.channelID == 1)
				this.addChatBotMessageToChatList('Welcome to Private room. Rules are for... people that follow rules.');
			return true;
		default:
			return false;
	}
}