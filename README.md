# NNotify

Animated toast notifications for Nette Framework — replaces flash messages with beautiful, stackable toasts.

## Features

- 🔔 **Toast Notifications** — Success, error, warning, info types
- ✨ **Animations** — Slide-in with auto-dismiss
- 📦 **Nette Component** — `{control toasts}` drop-in replacement for flash messages
- ⏱️ **Auto-dismiss** — Configurable timeout

## Installation

```bash
composer require jansuchanek/nnotify
```

## Configuration

```neon
extensions:
    notify: NNotify\DI\NNotifyExtension
```

## Usage

In your presenter:

```php
#[Inject]
public ToastControlFactory $toastFactory;

protected function createComponentToasts(): ToastControl
{
    return $this->toastFactory->create();
}
```

In your Latte template (replaces `{snippet flashes}...{/snippet}`):

```latte
{control toasts}
```

## Requirements

- PHP >= 8.2
- Nette Application ^3.2
- Latte ^3.1

## License

MIT
