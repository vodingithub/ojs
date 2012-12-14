<?php

/**
 * @file classes/mail/log/EmailLogEntry.inc.php
 *
 * Copyright (c) 2003-2012 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class EmailLogEntry
 * @ingroup article_log
 * @see EmailLogDAO
 *
 * @brief Describes an entry in the journal's email log.
 */

class EmailLogEntry extends DataObject {

	/**
	 * Constructor.
	 */
	function EmailLogEntry() {
		parent::DataObject();
	}

	//
	// Get/set methods
	//

	/**
	 * Get ID of journal.
	 * @return int
	 */
	function getJournalId() {
		return $this->getData('journalId');
	}

	/**
	 * Set ID of journal.
	 * @param $articleId int
	 */
	function setJournalId($journalId) {
		return $this->setData('journalId', $journalId);
	}

	/**
	 * Get user ID of sender.
	 * @return int
	 */
	function getSenderId() {
		return $this->getData('senderId');
	}

	/**
	 * Set user ID of sender.
	 * @param $senderId int
	 */
	function setSenderId($senderId) {
		return $this->setData('senderId', $senderId);
	}

	/**
	 * Get date email was sent.
	 * @return datestamp
	 */
	function getDateSent() {
		return $this->getData('dateSent');
	}

	/**
	 * Set date email was sent.
	 * @param $dateSent datestamp
	 */
	function setDateSent($dateSent) {
		return $this->setData('dateSent', $dateSent);
	}

	/**
	 * Get IP address of sender.
	 * @return string
	 */
	function getIPAddress() {
		return $this->getData('ipAddress');
	}

	/**
	 * Set IP address of sender.
	 * @param $ipAddress string
	 */
	function setIPAddress($ipAddress) {
		return $this->setData('ipAddress', $ipAddress);
	}

	/**
	 * Return the full name of the sender (not necessarily the same as the from address).
	 * @return string
	 */
	function getSenderFullName() {
		$senderFullName =& $this->getData('senderFullName');

		if(!isset($senderFullName)) {
			$userDao =& DAORegistry::getDAO('UserDAO');
			$senderFullName = $userDao->getUserFullName($this->getSenderId(), true);
		}

		return $senderFullName ? $senderFullName : '';
	}

	/**
	 * Return the email address of sender.
	 * @return string
	 */
	function getSenderEmail() {
		$senderEmail =& $this->getData('senderEmail');

		if(!isset($senderEmail)) {
			$userDao =& DAORegistry::getDAO('UserDAO');
			$senderEmail = $userDao->getUserEmail($this->getSenderId(), true);
		}

		return $senderEmail ? $senderEmail : '';
	}



	//
	// Email data
	//

	function getFrom() {
		return $this->getData('from');
	}

	function setFrom($from) {
		return $this->setData('from', $from);
	}

	function getRecipients() {
		return $this->getData('recipients');
	}

	function setRecipients($recipients) {
		return $this->setData('recipients', $recipients);
	}

	function getCcs() {
		return $this->getData('ccs');
	}

	function setCcs($ccs) {
		return $this->setData('ccs', $ccs);
	}

	function getBccs() {
		return $this->getData('bccs');
	}

	function setBccs($bccs) {
		return $this->setData('bccs', $bccs);
	}

	function getSubject() {
		return $this->getData('subject');
	}

	function setSubject($subject) {
		return $this->setData('subject', $subject);
	}

	function getBody() {
		return $this->getData('body');
	}

	function setBody($body) {
		return $this->setData('body', $body);
	}

}

?>
