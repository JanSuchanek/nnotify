<?php

declare(strict_types=1);

namespace NNotify\DI;

use NNotify\ToastControl;
use NNotify\ToastControlFactory;
use Nette\DI\CompilerExtension;

/**
 * Nette DI Extension for NNotify.
 *
 * Registers ToastControlFactory.
 *
 * Usage:
 *   extensions:
 *       notify: NNotify\DI\NNotifyExtension
 */
final class NNotifyExtension extends CompilerExtension
{
	public function loadConfiguration(): void
	{
		$builder = $this->getContainerBuilder();

		$builder->addFactoryDefinition($this->prefix('toastFactory'))
			->setImplement(ToastControlFactory::class)
			->getResultDefinition()
			->setFactory(ToastControl::class);
	}
}
