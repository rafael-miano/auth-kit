## AuthKit

A simple Laravel Livewire authentication UI kit for quickly scaffolding user auth, dashboard, and profile interfaces.

---

## 🧱 Requirements

- Laravel 12
  
- Livewire v3
  
- Tailwind CSS v4
  
- Vite
  
- Alpine.js
  

---

## 📦 Installation

### 1. Install via Composer

```bash
composer require rafaelmiano/auth-kit
```

---

### 2. Publish Assets (Views, Config, Components)

```bash
php artisan vendor:publish --tag=auth-kit
```

This will publish:

- Blade views to `resources/views/vendor/auth-kit/`
  
- Livewire components
  
- Blade components (sidebar, links, topbar)
  
- Layouts (e.g., `layouts/dashboard.blade.php`)
  

---

### 3. Register Service Provider (if needed)

Laravel 12 with package auto-discovery doesn't require manual registration.  
But if needed, add this to `config/app.php`:

```php
'providers' => [
    RafaelMiano\AuthKit\AuthKitServiceProvider::class,
],
```

---

### 4. Include Assets in `resources/js/app.js`

Ensure Alpine.js is installed and imported:

```bash
npm install alpinejs
```

---

### 5. Compile Frontend Assets

```bash
npm install && npm run dev
```

Or for production:

```bash
npm run build
```
