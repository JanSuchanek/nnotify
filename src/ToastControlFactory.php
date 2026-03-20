<?php

declare(strict_types=1);

namespace NNotify;

interface ToastControlFactory
{
	public function create(): ToastControl;
}
