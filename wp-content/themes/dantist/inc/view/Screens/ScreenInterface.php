<?php

namespace Dantist\View\Screens;

interface ScreenInterface {
	public function render( array $screen_data ): void;
}