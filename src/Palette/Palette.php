<?php

// namespace Palette;

class Palette
{
	const REGEX_HEX = "/^\#?[0-9A-F]{6}$/i";
	const REGEX_HEX_SHORT = "/^\#?[0-9A-F]{3}$/i";
	const REGEX_RGB_DEC = "/^rgb\([0-255]+,[0-255]+,[0-255]+\)$/i";

	public function __construct($color = null)
	{
		// Hex
		if ( preg_match(self::REGEX_HEX, $color) ) {
			// Remove hash
			$color = trim($color, '#');

			$this->red
		} else if ( preg_match(self::REGEX_HEX_SHORT, $color) ) { // Shorthand Hex
			// Remove hash
			$color = trim($color, '#');


		} else if ( preg_match(self::REGEX_RGB_DEC, $color) ) { // RGB Decimal

		}

	}
}
