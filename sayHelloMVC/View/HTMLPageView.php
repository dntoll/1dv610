<?php

namespace View;
//No need to change this file!

/**
 * Simple Template view for a HTML5 document
 *
 * Charset is set to UTF-8, no support of additional meta tags.
 *
 * Example:
 * $pv = new \view\HTMLPageView("Page Title", "<h1>Hello World</h1>");
 * $pv->echoHTML();
 * 
 */
class HTMLPageView {
	/**
	 * The title of the document, is displayed in the "<title>" in the head 
	 *
	 * Normally shown in the window frame of the browser
	 * 
	 * @var String
	 */
	private $title;

	/**
	 * HTML body, everything that should be shown between the <body></body> tags of a HTML document.
	 * 
	 * @var String HTML
	 */
	private $bodyHTML;

	/**
	 * HTML document charset, default value is utf-8
	 * 
	 * @var String a valid HTML charset
	 */
	private $charset = 'utf-8';

	/**
	 * Constructs a new HTMLPageView object
	 *
	 * Example:
	 * $pv = new \view\HTMLPageView("Page Title", "<h1>Hello World</h1>");
	 *
	 * @throws Exception if title is of zero length
	 * 
	 * @param String $title Document title.
	 * @param String $body HTML document body
	 */
	public function __construct(string $title, string $body) {

		//Make sure the title is set
		if (mb_strlen($title) == 0)
			throw new \Exception("HTML title must be longer than 0 characters");

		$this->title = $title;
		$this->bodyHTML = $body;
	}

	/**
	 * sets the HTML charset
	 * Example:
	 * $pv->setCharset("ISO-8859-1");
	 * 
	 * @param String $newCharSet the new char set 
	 */
	public function setCharset(string $newCharSet) {
		$this->charset = $newCharSet;
	}

	/**
	 * Echoes a formated HTML document to the output buffer
	 *
	 * Example: 
	 * $pv->echoHTML(); //HTML is sent to client output buffer
	 * 
	 * @return void but echoes the document to the OB
	 */
	public function echoHTML() {
		echo " 
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset='$this->charset'>
				<title>$this->title</title>
			</head>
			<body>
				$this->bodyHTML
			</body>
		</html>";

	}
}