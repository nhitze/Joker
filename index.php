<?php
#this is the master config. Dont write REQUEST in there without filtering. Dont EVER trust the User
$config = new StdClass();

#find out what pansy srvr we're on
if(class_exists('mysql_connect')) { $config->mysql->enabled = true; } else { $config->mysql->enabled = false; }
if(class_exists('mysqli')) { $config->mysqli->enabled = true; } else { $config->mysqli->enabled = false; }
if(class_exists('Memcached')) { $config->memcached->enabled = true; } else { $config->memcached->enabled = false; }

class JokerBlog {
	public $content = null;
	public function __construct() {
	}
	public function __toString() {
		return $this->content;
	}
}

#let there be UserInput now
$request = (object) null;
$request->data = $_REQUEST;
$request->post = $_POST;
$request->get = $_GET;

#now get us an action
echo filter_var($_GET['action'], FILTER_SANITIZE_STRIPPED);
$request->get->action = filter_var($request->get->action, FILTER_SANITIZE_STRING);
if(filter_var($request->get->action, FILTER_VALIDATE_STRING)) echo 'valid';
else echo 'not valid';
switch($request->get->action) {
	case 'blog':
		$content = new JokerBlog();
}

echo $content;

var_dump($request->get);
