<?php
/**
 * slack
 *
 * PHP wrapper for the Slack API: https://api.slack.com/
 *
 * @author Pat Leonard <leonard.56@osu.edu>
 * @version 0.1
 * @package slack
 * @example test.php
 * @link https://api.slack.com/
 * @license BSD License
 */

class Slack
{
	/**
	* The incoming hook url. 
	*
	* @var string
	*/
	private $_url;

	/**
	* The message
	*
	* @var string
	*/
	private $_message;

	/**
	* The response code
	*
	* @var int
	*/
	private $_responseCode;

	/**
	 * Default constructor
	 */
	public function __construct () {
    }

	/**
	 * Set url
	 *
	 * @param string $token Your app API key.
	 *
	 * @return void
	 */
    public function setURL ($url) {
        $this->_url = (string)$url;
    }

	/**
	 * Set message
	 *
	 * @param string $msg Message of slack notification.
	 *
	 * @return void
	 */
    public function setMessage ($msg) {
        $this->_message = (string)$msg;
    }

    /**
	 * Set message
	 *
	 * @param string $msg Message of slack notification.
	 *
	 * @return void
	 */
    public function setResponseCode ($code) {
        $this->_responseCode = (string)$code;
    }

	/**
	 * Get message
	 *
	 * @return string
	 */
    public function getMessage () {
        return $this->_message;
    }

	/**
	 * Get url
	 *
	 * @return string
	 */
    public function getURL () {
        return $this->_url;
    }

    /**
	 * Get responseCode
	 *
	 * @return int
	 */
    public function getResponseCode () {
        return $this->_responseCode;
    }

	/**
	 * Send message to Incoming Message Hook
	 *
	 * @return bool
	 */
	public function send() {
		if(!Empty($this->_url) && !Empty($this->_message)) {
			// Format the message
			$request = array('text' => $this->_message);
			$data_string = json_encode($request);
			// Send the message.
			$c = curl_init($this->_url);
			curl_setopt($c, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json',));
            curl_setopt($c, CURLOPT_POSTFIELDS, $data_string);
            curl_exec($c);
            // This particular Slack endpoint does not provide really useful responses, so
            // all we can really do is assume that if we got a 200 back, then the message was posted.
            $code = curl_getinfo($c, CURLINFO_HTTP_CODE);
            $this->setResponseCode($code);
            if($code == 200) {
            	return TRUE;
            } else {
            	return FALSE;
            }
		}
	}
}
?>
