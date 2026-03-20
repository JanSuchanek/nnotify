<?php

declare(strict_types=1);

namespace NNotify;

use Nette\Application\UI\Control;

/**
 * Toast notification component for Nette admin.
 *
 * Enhances Nette flash messages with animated Bootstrap toasts.
 */
final class ToastControl extends Control
{
	/** @var list<array{message: string, type: string}> */
	private array $customToasts = [];


	public function addToast(string $message, string $type = 'info'): void
	{
		$this->customToasts[] = ['message' => $message, 'type' => $type];
	}


	public function render(): void
	{
		/** @var \Nette\Bridges\ApplicationLatte\DefaultTemplate $template */
		$template = $this->getTemplate();

		$flashes = $this->getPresenter()->getFlashSession()->get($this->getPresenter()->getParameterId('flash'));
		$toasts = [];

		if (is_array($flashes)) {
			foreach ($flashes as $flash) {
				if (is_object($flash) && isset($flash->message, $flash->type)) {
					$toasts[] = [
						'message' => (string) $flash->message,
						'type' => (string) ($flash->type ?? 'info'),
					];
				}
			}
		}

		foreach ($this->customToasts as $toast) {
			$toasts[] = $toast;
		}

		$template->toasts = $toasts;
		$template->setFile(__DIR__ . '/../templates/toasts.latte');
		$template->render();
	}
}
