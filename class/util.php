<?php

require_once 'zaim.php';

class Util {

	const KEYSFILE = "../keys.json";

	public static function get_oauth_consumer()
	{
		if (isset($_SESSION['consumer']) == false) {
			$zaim = new Zaim();
			$object = serialize($zaim);
			$_SESSION['consumer'] = $object;
		}
		return unserialize($_SESSION['consumer']);
	}

	public static function load_keys_file()
	{
		$json = file_get_contents(Util::KEYSFILE);
		$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
		$keys = json_decode($json , true);
		return $keys;
	}

}

?>
