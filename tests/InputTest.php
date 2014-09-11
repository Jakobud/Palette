<?php

use Palette\Palette;

class InputTest extends TestFixture
{
	public function test_hex_input_white_color()
	{
		$color = new Palette("#FFFFFF");
		$this->assertEquals(255, $color->red());
		$this->assertEquals(255, $color->green());
		$this->assertEquals(255, $color->blue());
	}

	public function test_hex_input_black_color()
	{
		$color = new Palette("#000000");
		$this->assertEquals(0, $color->red());
		$this->assertEquals(0, $color->green());
		$this->assertEquals(0, $color->blue());
	}

	public function test_hex_input_random_color()
	{
		$color = new Palette("#45F30C");
		$this->assertEquals(69, $color->red());
		$this->assertEquals(243, $color->green());
		$this->assertEquals(12, $color->blue());
	}

	public function test_hex_input_white_color_without_hash()
	{
		$color = new Palette("FFFFFF");
		$this->assertEquals(255, $color->red());
		$this->assertEquals(255, $color->green());
		$this->assertEquals(255, $color->blue());
	}

	public function test_hex_input_black_color_without_hash()
	{
		$color = new Palette("000000");
		$this->assertEquals(0, $color->red());
		$this->assertEquals(0, $color->green());
		$this->assertEquals(0, $color->blue());
	}

	public function test_hex_input_random_color_without_hash()
	{
		$color = new Palette("A8351C");
		$this->assertEquals(168, $color->red());
		$this->assertEquals(53, $color->green());
		$this->assertEquals(28, $color->blue());
	}

	public function test_short_hex_input_white_color()
	{
		$color = new Palette("#FFF");
		$this->assertEquals(255, $color->red());
		$this->assertEquals(255, $color->green());
		$this->assertEquals(255, $color->blue());
	}

	public function test_short_hex_input_black_color()
	{
		$color = new Palette("#000");
		$this->assertEquals(0, $color->red());
		$this->assertEquals(0, $color->green());
		$this->assertEquals(0, $color->blue());
	}

	public function test_short_hex_input_random_color()
	{
		$color = new Palette("#D9A");
		$this->assertEquals(221, $color->red());
		$this->assertEquals(153, $color->green());
		$this->assertEquals(170, $color->blue());
	}

	public function test_short_hex_input_without_hash_white_color()
	{
		$color = new Palette("FFF");
		$this->assertEquals(255, $color->red());
		$this->assertEquals(255, $color->green());
		$this->assertEquals(255, $color->blue());
	}

	public function test_short_hex_input_without_hash_black_color()
	{
		$color = new Palette("000");
		$this->assertEquals(0, $color->red());
		$this->assertEquals(0, $color->green());
		$this->assertEquals(0, $color->blue());
	}

	public function test_short_hex_input_without_hash_random_color()
	{
		$color = new Palette("7A3");
		$this->assertEquals(119, $color->red());
		$this->assertEquals(170, $color->green());
		$this->assertEquals(51, $color->blue());
	}
}
