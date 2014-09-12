<?php

use Palette\Palette;

class HslInputTest extends TestFixture
{
	public function test_hsl_input()
	{
		$color = new Palette('hsl(360,40%,70%)');
		$this->assertEquals(209, $color->red());
		$this->assertEquals(148, $color->green());
		$this->assertEquals(148, $color->blue());
	}
}
