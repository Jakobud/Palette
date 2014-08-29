<?php

// namespace Palette;

class Palette
{
	const REGEX_HEX = "/^\#?[0-9A-F]{6}$/";
	const REGEX_HEX_SHORT = "/^\#?[0-9A-F]{3}$/";
	const REGEX_RGB_DEC = "/^rgb\([0-255]+,[0-255]+,[0-255]+\)$/";

	public function __construct($color = null)
	{
		// Normalize string (lowercase, remove whitespace)
		$color = preg_replace("/\s+/", "", strtolower($color));
		var_dump($color);

		// Determine color format
		if ( preg_match(self::REGEX_HEX, $color) ) {
			// Hex

			// Remove hash
			$color = trim($color, '#');

			var_dump("hex");


		} else if ( preg_match(self::REGEX_HEX_SHORT, $color) ) {
			// Shorthand Hex

			// Remove hash
			$color = trim($color, '#');

			var_dump("hex short");

		} else if ( preg_match(self::REGEX_RGB_DEC, $color) ) {
			// RGB Decimal

			var_dump("rgb dec");

		}

	}
}
