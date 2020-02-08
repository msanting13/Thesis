<?php
namespace App\Http\Repository;

class EncryptorRepository
{
	public const SEPERATOR_CODE = "0x20";
	/**
	 * This will change each character of the word into ascii code
	 */
	public static function load(array $items = [])
	{
		$holder = [];
			foreach ($items as $value) {
            	$splitted = str_split($value);
                $code = '';
                foreach ($splitted as $key => $character) {
                	$code .= ord($character);
                	if (($key + 1) != count($splitted)) {
                		$code .= self::SEPERATOR_CODE;
                	}
                }
                $holder[] = $code;
         	}
         return $holder;
	}


    public static function decrypt(string $item)
    {
        $string = explode(self::SEPERATOR_CODE, $item);
        return implode('', array_map('chr', $string));
    }

}