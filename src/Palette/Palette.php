<?php

namespace Palette;

class Palette
{
	/**
	 * Alpha
	 * Value between 0.0 (transparent) and 1.0 (opaque)
	 * @var float
	 */
	private $alpha = 1.0;

	/**
	 * Red
	 * Value between 0 and 255
	 * @var integer
	 */
	private $red;

	/**
	 * Green
	 * Value between 0 and 255
	 * @var integer
	 */
	private $green;

	/**
	 * Blue
	 * Value between 0 and 255
	 * @var integer
	 */
	private $blue;

	/**
	 * Hue
	 * Value between 0 and 360
	 * @var iintegernt
	 */
	private $hue;

	/**
	 * HSL Saturation percentage
	 * Value between 0 and 100
	 * @var integer
	 */
	private $saturationL;
	private $saturationB;
	private $brightness;

	/**
	 * Lightness percentage
	 * Value between 0 and 100
	 * @var integer
	 */
	private $lightness;

	/**
	 * Decimal Precision for float values
	 * @var integer
	 */
	private $precision = 2;

	// Regex patterns
	const REGEX_HEX = "/^\#?[0-9a-f]{6}$/";
	const REGEX_HEX_ALPHA = "/^\#?[0-9a-f]{8}$/";
	const REGEX_HEX_SHORT = "/^\#?[0-9a-f]{3}$/";
	const REGEX_HEX_SHORT_ALPHA = "/^\#?[0-9a-f]{4}$/";
	const REGEX_RGB_DEC = "/^rgb\(([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]),([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]),([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\)$/";
	const REGEX_RGBA_DEC = "/^rgba\(([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]),([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]),([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]),(0?(\.\d+)?|1(\.0+)?)\)$/";
	const REGEX_HSL = "/^hsl\(([0-9]|[1-9][0-9]|[1-2][0-9][0-9]|3[0-5][0-9]|360),([0-9]|[1-9][0-9]|100)%,([0-9]|[1-9][0-9]|100)%\)$/";
	const REGEX_HSLA = "/^hsla\(([0-9]|[1-9][0-9]|[1-2][0-9][0-9]|3[0-5][0-9]|360),([0-9]|[1-9][0-9]|100)%,([0-9]|[1-9][0-9]|100)%,(0?(\.\d+)?|1(\.0+)?)\)$/";

	// http://www.w3.org/TR/css3-color/
	private $cssColorNames = array(
		'aliceblue' => 'F0F8FF',
		'antiquewhite' => 'FAEBD7',
		'aqua' => '00FFFF',
		'aqua' => '00FFFF',
		'aquamarine' => '7FFFD4',
		'azure' => 'F0FFFF',
		'beige' => 'F5F5DC',
		'bisque' => 'FFE4C4',
		'black' => '000000',
		'black' => '000000',
		'blanchedalmond' => 'FFEBCD',
		'blue' => '0000FF',
		'blue' => '0000FF',
		'blueviolet' => '8A2BE2',
		'brown' => 'A52A2A',
		'burlywood' => 'DEB887',
		'cadetblue' => '5F9EA0',
		'chartreuse' => '7FFF00',
		'chocolate' => 'D2691E',
		'coral' => 'FF7F50',
		'cornflowerblue' => '6495ED',
		'cornsilk' => 'FFF8DC',
		'crimson' => 'DC143C',
		'cyan' => '00FFFF',
		'darkblue' => '00008B',
		'darkcyan' => '008B8B',
		'darkgoldenrod' => 'B8860B',
		'darkgray' => 'A9A9A9',
		'darkgreen' => '006400',
		'darkgrey' => 'A9A9A9',
		'darkkhaki' => 'BDB76B',
		'darkmagenta' => '8B008B',
		'darkolivegreen' => '556B2F',
		'darkorange' => 'FF8C00',
		'darkorchid' => '9932CC',
		'darkred' => '8B0000',
		'darksalmon' => 'E9967A',
		'darkseagreen' => '8FBC8F',
		'darkslateblue' => '483D8B',
		'darkslategray' => '2F4F4F',
		'darkslategrey' => '2F4F4F',
		'darkturquoise' => '00CED1',
		'darkviolet' => '9400D3',
		'deeppink' => 'FF1493',
		'deepskyblue' => '00BFFF',
		'dimgray' => '696969',
		'dimgrey' => '696969',
		'dodgerblue' => '1E90FF',
		'firebrick' => 'B22222',
		'floralwhite' => 'FFFAF0',
		'forestgreen' => '228B22',
		'fuchsia' => 'FF00FF',
		'fuchsia' => 'FF00FF',
		'gainsboro' => 'DCDCDC',
		'ghostwhite' => 'F8F8FF',
		'gold' => 'FFD700',
		'goldenrod' => 'DAA520',
		'gray' => '808080',
		'gray' => '808080',
		'green' => '008000',
		'green' => '008000',
		'greenyellow' => 'ADFF2F',
		'grey' => '808080',
		'honeydew' => 'F0FFF0',
		'hotpink' => 'FF69B4',
		'indianred' => 'CD5C5C',
		'indigo' => '4B0082',
		'ivory' => 'FFFFF0',
		'khaki' => 'F0E68C',
		'lavender' => 'E6E6FA',
		'lavenderblush' => 'FFF0F5',
		'lawngreen' => '7CFC00',
		'lemonchiffon' => 'FFFACD',
		'lightblue' => 'ADD8E6',
		'lightcoral' => 'F08080',
		'lightcyan' => 'E0FFFF',
		'lightgoldenrodyellow' => 'FAFAD2',
		'lightgray' => 'D3D3D3',
		'lightgreen' => '90EE90',
		'lightgrey' => 'D3D3D3',
		'lightpink' => 'FFB6C1',
		'lightsalmon' => 'FFA07A',
		'lightseagreen' => '20B2AA',
		'lightskyblue' => '87CEFA',
		'lightslategray' => '778899',
		'lightslategrey' => '778899',
		'lightsteelblue' => 'B0C4DE',
		'lightyellow' => 'FFFFE0',
		'lime' => '00FF00',
		'lime' => '00FF00',
		'limegreen' => '32CD32',
		'linen' => 'FAF0E6',
		'magenta' => 'FF00FF',
		'maroon' => '800000',
		'maroon' => '800000',
		'mediumaquamarine' => '66CDAA',
		'mediumblue' => '0000CD',
		'mediumorchid' => 'BA55D3',
		'mediumpurple' => '9370DB',
		'mediumseagreen' => '3CB371',
		'mediumslateblue' => '7B68EE',
		'mediumspringgreen' => '00FA9A',
		'mediumturquoise' => '48D1CC',
		'mediumvioletred' => 'C71585',
		'midnightblue' => '191970',
		'mintcream' => 'F5FFFA',
		'mistyrose' => 'FFE4E1',
		'moccasin' => 'FFE4B5',
		'navajowhite' => 'FFDEAD',
		'navy' => '000080',
		'navy' => '000080',
		'oldlace' => 'FDF5E6',
		'olive' => '808000',
		'olive' => '808000',
		'olivedrab' => '6B8E23',
		'orange' => 'FFA500',
		'orangered' => 'FF4500',
		'orchid' => 'DA70D6',
		'palegoldenrod' => 'EEE8AA',
		'palegreen' => '98FB98',
		'paleturquoise' => 'AFEEEE',
		'palevioletred' => 'DB7093',
		'papayawhip' => 'FFEFD5',
		'peachpuff' => 'FFDAB9',
		'peru' => 'CD853F',
		'pink' => 'FFC0CB',
		'plum' => 'DDA0DD',
		'powderblue' => 'B0E0E6',
		'purple' => '800080',
		'purple' => '800080',
		'rebeccapurple' => '663399',
		'red' => 'FF0000',
		'red' => 'FF0000',
		'rosybrown' => 'BC8F8F',
		'royalblue' => '4169E1',
		'saddlebrown' => '8B4513',
		'salmon' => 'FA8072',
		'sandybrown' => 'F4A460',
		'seagreen' => '2E8B57',
		'seashell' => 'FFF5EE',
		'sienna' => 'A0522D',
		'silver' => 'C0C0C0',
		'silver' => 'C0C0C0',
		'skyblue' => '87CEEB',
		'slateblue' => '6A5ACD',
		'slategray' => '708090',
		'slategrey' => '708090',
		'snow' => 'FFFAFA',
		'springgreen' => '00FF7F',
		'steelblue' => '4682B4',
		'tan' => 'D2B48C',
		'teal' => '008080',
		'teal' => '008080',
		'thistle' => 'D8BFD8',
		'tomato' => 'FF6347',
		'turquoise' => '40E0D0',
		'violet' => 'EE82EE',
		'wheat' => 'F5DEB3',
		'white' => 'FFFFFF',
		'white' => 'FFFFFF',
		'whitesmoke' => 'F5F5F5',
		'yellow' => 'FFFF00',
		'yellow' => 'FFFF00',
		'yellowgreen' => '9ACD32',
	);

	// http://hexwords.info/
	private $cssHexWords = array(
		'abacas' => 'ABACA5',
		'abbess' => 'ABBE55',
		'accede' => 'ACCEDE',
		'access' => 'ACCE55',
		'accost' => 'ACC057',
		'acetal' => 'ACE7A1',
		'affect' => 'AFFEC7',
		'afloat' => 'AF10A7',
		'albata' => 'ALBA7A',
		'albedo' => 'A1BED0',
		'aldose' => 'A1D05E',
		'allele' => 'A11E1E',
		'assess' => 'A55E55',
		'assets' => 'A55E75',
		'allest' => 'A77E57',
		'babble' => 'BABB1E',
		'badass' => 'BADA55',
		'baffle' => 'BAFF1E',
		'balata' => 'BA1A7A',
		'balboa' => 'BA1B0A',
		'ballad' => 'BA11AD',
		'ballet' => 'BA11E7',
		'ballot' => 'BA11O7',
		'basalt' => 'BA5A17',
		'basset' => 'BA55E7',
		'battle' => 'BA771E',
		'beaded' => 'BEADED',
		'beetle' => 'BEE71E',
		'befall' => 'BEFA11',
		'befool' => 'BEF001',
		'belted' => 'BE71ED',
		'blotto' => 'B10770',
		'bobble' => 'B0BB1E',
		'bobcat' => 'B0BCA7',
		'boobee' => 'B00BEE',
		'boodle' => 'B00D1E',
		'booted' => 'B007ED',
		'bootee' => 'B007EE',
		'bottle' => 'B0771E',
		'cabala' => 'CABA1A',
		'cabbie' => 'CABB1E',
		'cablet' => 'CAB1E7',
		'calces' => 'CA1CE5',
		'casaba' => 'CA5ABA',
		'castle' => 'CA571E',
		'catalo' => 'CA7A10',
		'cattle' => 'CA771E',
		'closed' => 'C105ED',
		'closet' => 'CLO5E7',
		'cobalt' => 'C0BA17',
		'cobble' => 'C0BB1E',
		'coddle' => 'C0DD1E',
		'coffee' => 'C0FFEE',
		'coffle' => 'C0FF1E',
		'collet' => 'C011E7',
		'cosset' => 'C055E7',
		'dabble' => 'DABB1E',
		'doddle' => 'D0DD1E',
		'debase' => 'DEBA5E',
		'decade' => 'DECADE',
		'decaff' => 'DECAFF',
		'decode' => 'DEC0DE',
		'deface' => 'DEFACE',
		'defeat' => 'DEFEAT',
		'defect' => 'DEFEC7',
		'delete' => 'DE1E7E',
		'detect' => 'DE7EC7',
		'detest' => 'DE7E57',
		'doodle' => 'D00D1E',
		'dossal' => 'D0SSA1',
		'dotted' => 'D077ED',
		'dottle' => 'D0771E',
		'efface' => 'EFFACE',
		'effect' => 'EFFEC7',
		'effete' => 'EFFE7E',
		'eldest' => 'E1DE57',
		'fabled' => 'FAB1ED',
		'faeces' => 'FAECE5',
		'fallal' => 'FA11A1',
		'fasces' => 'FA5CE5',
		'feeble' => 'FEEB1E',
		'felloe' => 'FE110E',
		'festal' => 'FE57A1',
		'fettle' => 'FE771E',
		'fleece' => 'F1EECE',
		'floats' => 'F10A75',
		'fiasco' => 'F1A5C0',
		'footed' => 'F007ED',
		'footle' => 'F0071E',
		'lablab' => '1AB1AB',
		'lessee' => '1E55EE',
		'loaded' => '1OADED',
		'locale' => '10CA1E',
		'obsess' => '0B5E55',
		'obtect' => '0B7EC7',
		'obtest' => 'OB7E57',
		'0celot' => '0CE107',
		'offset' => '0FF5E7',
		'oldest' => 'O1DE57',
		'oddles' => '00D1E5',
		'osteal' => 'OS7EA1',
		'saddle' => '5ADD1E',
		'salade' => '5A1ADE',
		'sallet' => '5A11E7',
		'salted' => '5A17ED',
		'sealed' => '5EA1ED',
		'secede' => '5ECEDE',
		'select' => '5E1EC7',
		'setose' => '5E705E',
		'settee' => 'SE77EE',
		'settle' => 'SE771E',
		'solace' => '501ACE',
		'sotted' => '5077ED',
		'stable' => '57AB1E',
		'stacte' => '57AC7E',
		'steels' => '57EE15',
		'tables' => '7AB1E5',
		'tablet' => '7AB1E7',
		'tassle' => '7A55E1',
		'tasset' => '7A55E7',
		'tattle' => '7A771E',
		'tattoo' => '7A7700',
		'teasel' => '7EA5E1',
		'testee' => '7E57EE',
		'testes' => '7E57E5',
		'toddle' => '70DD1E',
		'toffee' => '70FFEE',
		'tootle' => '70071E',
	);

	public function __construct($color = null)
	{
		// Normalize input string (to lowercase, remove whitespace)
		$color = preg_replace("/\s+/", "", strtolower(trim($color, '#')));

		// Determine input color format
		if ( preg_match(self::REGEX_HEX, $color) ) {
			/**
			 * Hex format
			 * Example: ff00ff
			 */
			$this->red = (int) hexdec(substr($color, 0, 2));
			$this->green = (int) hexdec(substr($color, 2, 2));
			$this->blue = (int) hexdec(substr($color, 4));
			extract($this->rgbToHsl($this->red, $this->green, $this->blue));
			$this->hue = $hue;
			$this->saturationL = $saturation;
			$this->lightness = $lightness;

		} else if ( preg_match(self::REGEX_HEX_ALPHA, $color) ) {
			/**
			 * Hex format with alpha
			 * Example: ff00ff80
			 */
			$this->red = (int) hexdec(substr($color, 0, 2));
			$this->green = (int) hexdec(substr($color, 2, 2));
			$this->blue = (int) hexdec(substr($color, 4, 2));
			$this->alpha = (float) round(hexdec(substr($color, 6))/255, $this->precision);
			extract($this->rgbToHsl($this->red, $this->green, $this->blue));
			$this->hue = $hue;
			$this->saturationL = $saturation;
			$this->lightness = $lightness;

		} else if ( preg_match(self::REGEX_HEX_SHORT, $color) ) {
			/**
			 * Shorthand hex format
			 * Example: f0f
			 */
			$this->red = (int) hexdec(substr($color, 0, 1).substr($color, 0, 1));
			$this->green = (int) hexdec(substr($color, 1, 1).substr($color, 1, 1));
			$this->blue = (int) hexdec(substr($color, 2).substr($color, 2));
			extract($this->rgbToHsl($this->red, $this->green, $this->blue));
			$this->hue = $hue;
			$this->saturationL = $saturation;
			$this->lightness = $lightness;

		} else if ( preg_match(self::REGEX_HEX_SHORT_ALPHA, $color) ) {
			/**
			 * Shorthand hex format with alpha
			 * Example: f0f8
			 */
			$this->red = (int) hexdec(substr($color, 0, 1).substr($color, 0, 1));
			$this->green = (int) hexdec(substr($color, 1, 1).substr($color, 1, 1));
			$this->blue = (int) hexdec(substr($color, 2, 1).substr($color, 2, 1));
			$this->alpha = (float) round(hexdec(substr($color, 3).substr($color, 3))/255, $this->precision);
			extract($this->rgbToHsl($this->red, $this->green, $this->blue));
			$this->hue = $hue;
			$this->saturationL = $saturation;
			$this->lightness = $lightness;

		} else if ( preg_match(self::REGEX_RGB_DEC, $color) ) {
			/**
			 * RGB Decimal format
			 * Example: rgb(255,0,255)
			 */
			$color = str_replace(['rgb(',')'], '', $color);
			$pieces = explode(',', $color);
			$this->red = (int) $pieces[0];
			$this->green = (int) $pieces[1];
			$this->blue = (int) $pieces[2];
			extract($this->rgbToHsl($this->red, $this->green, $this->blue));
			$this->hue = $hue;
			$this->saturationL = $saturation;
			$this->lightness = $lightness;

		} else if ( preg_match(self::REGEX_RGBA_DEC, $color) ) {
			/**
			 * RGBA Decimal format
			 * Example: rgba(255,0,255,0.5)
			 */
			$color = str_replace(['rgba(',')'], '', $color);
			$pieces = explode(',', $color);
			$this->red = (int) $pieces[0];
			$this->green = (int) $pieces[1];
			$this->blue = (int) $pieces[2];
			$this->alpha = (float) round($pieces[3], $this->precision);
			extract($this->rgbToHsl($this->red, $this->green, $this->blue));
			$this->hue = $hue;
			$this->saturationL = $saturation;
			$this->lightness = $lightness;

		} else if ( preg_match(self::REGEX_HSL, $color) ) {
			/**
			 * HSL Format
			 * Example: hsl(325,50%,75%)
			 * http://www.brandonheyer.com/2013/03/27/convert-hsl-to-rgb-and-rgb-to-hsl-via-php/
			 */
			$color = str_replace(['hsl(',')','%'], '', $color);
			$pieces = explode(',', $color);
			$this->hue = (int) $pieces[0];
			$this->saturationL = (int) $pieces[1];
			$this->lightness = (int) $pieces[2];
			extract($this->hslToRgb($this->hue, $this->saturationL, $this->lightness));
			// $this->red = $red;
			// $this->green = $green;
			// $this->blue = $blue;

		} else if ( preg_match(self::REGEX_HSLA, $color) ) {
			/**
			 * HSLA Format
			 * Example: hsla(145,30%,49%,0.5)
			 */
			$color = str_replace(['hsl(',')'], '', $color);

		} else if ( array_key_exists($color, $this->cssColorNames) ) {
			/**
			 * CSS Color Name format
			 * Example: darkblue
			 * @var string
			 */
			$this->red = (int) hexdec(substr($this->cssColorNames[$color], 0, 2));
			$this->green = (int) hexdec(substr($this->cssColorNames[$color], 2, 2));
			$this->blue = (int) hexdec(substr($this->cssColorNames[$color], 4));
			extract($this->rgbToHsl($this->red, $this->green, $this->blue));
			$this->hue = $hue;
			$this->saturationL = $saturation;
			$this->lightness = $lightness;

		} else if ( array_key_exists($color, $this->cssHexWords) ) {
			/**
			 * Hex Word format
			 * Example: badass
			 * @var string
			 */
			$this->red = (int) hexdec(substr($this->cssHexWords[$color], 0, 2));
			$this->green = (int) hexdec(substr($this->cssHexWords[$color], 2, 2));
			$this->blue = (int) hexdec(substr($this->cssHexWords[$color], 4));
			extract($this->rgbToHsl($this->red, $this->green, $this->blue));
			$this->hue = $hue;
			$this->saturationL = $saturation;
			$this->lightness = $lightness;

		} else {
			// No matches found for input color format, throw exception
			throw new InvalidArgumentException("Unsupported Color Format");
		}

		unset($this->cssColorNames, $this->cssHexWords);
		var_dump($this);

	}

	/**
	 * Convert RGB to HSL
	 * @param  int $red
	 * @param  int $green
	 * @param  int $blue
	 * @return array
	 * http://serennu.com/colour/rgbtohsl.php
	 */
	private function rgbToHsl($red, $green, $blue)
	{
		$red /= 255;
		$green /= 255;
		$blue /= 255;

		$min = min($red,$green,$blue);
		$max = max($red,$green,$blue);
		$diff = $max - $min;

		$lightness = ($max + $min) / 2;

		if ($diff == 0) {
			$hue = 0;
			$saturation = 0;
		} else {
			if ($lightness < 0.5) {
				$saturation = $diff / ($max + $min);
			} else {
				$saturation = $diff / (2 - $max - $min);
			};

			$del_r = ((($max - $red) / 6) + ($diff / 2)) / $diff;
			$del_g = ((($max - $green) / 6) + ($diff / 2)) / $diff;
			$del_b = ((($max - $blue) / 6) + ($diff / 2)) / $diff;

			if ($max == $red) {
				$hue = $del_b - $del_g;
			} elseif ($max == $green) {
				$hue = (1 / 3) + $del_r - $del_b;
			} elseif ($max == $blue) {
				$hue = (2 / 3) + $del_g - $del_r;
			};

			if ($hue < 0) {
				$hue += 1;
			};

			if ($hue > 1) {
				$hue -= 1;
			};
		};

		return array('hue'=>(int)round($hue*360), 'saturation'=>round($saturation*100), 'lightness'=>round($lightness*100));
	}

	/**
	 * Convert RGB to HSB
	 * @param  int $r
	 * @param  int $g
	 * @param  int $b
	 * @return [type]
	 */
	private function rgbToHsb($r, $g, $b)
	{

	}

	/**
	 * Convert HSL to RGB
	 * @param  int $h
	 * @param  int $s
	 * @param  int $l
	 * @return [type]
	 */
	private function hslToRgb($hue, $saturation, $lightness)
	{

	}

	/**
	 *  Convert HSB to RGB
	 * @param  int $h
	 * @param  int $s
	 * @param  int $b
	 * @return [type]
	 */
	private function hsbToRgb($h, $s, $b)
	{

	}

	/**
	 * Convert HSL to HSB
	 * @param  int $h
	 * @param  int $s
	 * @param  int $l
	 * @return [type]
	 */
	private function hslToHsb($h, $s, $l)
	{

	}

	/**
	 * Convert HSB to HSL
	 * @param  int $h
	 * @param  int $s
	 * @param  int $b
	 * @return [type]
	 */
	private function hsbToHsl($h, $s, $b)
	{

	}

	/**
	 * Convert decimal color value to shorthand hex value
	 * @param  int $color A value between 0 and 255
	 * @return string A shorthand hex value between 0 and F
	 */
	private function decToShorthandHex($color)
	{
		$remainder = $color%17;
		if ( $remainder > 7 ) {
			return dechex($color-$remainder+17)[0];
		} else {
			return dechex($color-$remainder)[0];
		}
	}

	/**
	 * Output the color in hex format (#rrggbb)
	 * @return string
	 */
	public function hex()
	{
		return "#".str_pad(dechex($this->red), 2, STR_PAD_LEFT).
		str_pad(dechex($this->green), 2, STR_PAD_LEFT).
		str_pad(dechex($this->blue), 2, STR_PAD_LEFT);
	}

	/**
	 * Output the color in hex format with alpha (#rrggbbaa)
	 * @return string
	 */
	public function hexAlpha()
	{
		return $this->hex().dechex(round($this->alpha*255));
	}

	/**
	 * Output the color in short hex format (#rgb)
	 * @return string
	 */
	public function shorthandHex()
	{
		$output = '#';
		foreach( [$this->red, $this->green, $this->blue] as $color) {
			$output .= $this->decToShorthandHex($color);
		}
		return $output;
	}

	/**
	 * Output the color in shorthand hex format with alpha #rgba
	 * @return string
	 */
	public function shorthandHexAlpha()
	{
		return $this->shorthandHex().$this->decToShorthandHex($this->alpha*255);
	}

	/**
	 * Output the color in web safe hex format (#rrggbb)
	 * @return string
	 */
	public function webSafeHex()
	{
		return "#".dechex(round($this->red/51)*51).
		dechex(round($this->green/51)*51).
		dechex(round($this->blue/51)*51);
	}
}
