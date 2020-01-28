<?php
class Device{
	public static function find_mobile_device(){
		$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
		$device = "Other";
		if (strpos ($userAgent, 'mobile') !== false) $device = "Mobile";
		return $device;
	}
		
}