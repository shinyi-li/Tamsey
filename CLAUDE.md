# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel 12 application using Livewire 3 and Volt for reactive components, with Laravel Breeze for authentication. The project uses SQLite for the database, Tailwind CSS for styling, and Vite for asset bundling. Testing is done with Pest PHP.

## Development Commands

### Running the Development Environment
```bash
# Start all services (server, queue, logs, vite) concurrently
composer dev

# Alternative: Run services separately
php artisan serve              # Development server (port 8000)
php artisan queue:listen       # Queue worker
php artisan pail               # Log viewer
npm run dev                    # Vite dev server with hot reload
```

### Building Assets
```bash
npm run build                  # Build production assets
```

### Testing
```bash
# Run all tests
composer test
# Or directly:
php artisan test

# Run specific test file
php artisan test --filter=TestClassName

# Run tests in specific directory
php artisan test tests/Feature
php artisan test tests/Unit
```

### Code Quality
```bash
# Format code with Laravel Pint
./vendor/bin/pint

# Run Pint on specific files
./vendor/bin/pint app/Models
```

### Database Commands
```bash
# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Fresh migration (drops all tables and re-runs)
php artisan migrate:fresh

# Seed database
php artisan db:seed

# Fresh migration with seeding
php artisan migrate:fresh --seed
```

### Artisan Helpers
```bash
# Create new Livewire component
php artisan make:livewire ComponentName

# Create new Livewire form
php artisan make:livewire-form FormName

# Create new Volt component (functional)
php artisan make:volt ComponentName

# Create new migration
php artisan migrate:make create_table_name_table

# Create new model with migration
php artisan make:model ModelName -m

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

## Architecture Overview

### Directory Structure

- **app/Livewire/**: Livewire components organized into subdirectories
  - **Actions/**: Reusable Livewire actions (e.g., Logout)
  - **Forms/**: Livewire form objects (e.g., LoginForm)
  - Component classes (e.g., Profile.php)

- **resources/views/**: Blade templates
  - **components/**: Reusable Blade components
  - **layouts/**: Layout templates (app, guest)
  - **livewire/**: Livewire component views
  - Page views (dashboard, profile, welcome)

- **routes/**: Route definitions
  - **web.php**: Web routes with Livewire component routes
  - **auth.php**: Authentication routes (from Breeze)
  - **console.php**: Artisan console routes

- **database/**: Database files and migrations
  - **database.sqlite**: SQLite database file
  - **migrations/**: Database migration files
  - **factories/**: Model factories for testing
  - **seeders/**: Database seeders

- **tests/**: Pest PHP tests
  - **Pest.php**: Pest configuration with RefreshDatabase trait for Feature tests
  - **Feature/**: Feature tests (uses RefreshDatabase)
  - **Unit/**: Unit tests

### Key Technologies

- **Livewire 3 + Volt**: Used for reactive components. Livewire classes are in `app/Livewire/`, views in `resources/views/livewire/`
- **Laravel Breeze**: Provides authentication scaffolding
- **SQLite**: Default database (database/database.sqlite)
- **Tailwind CSS**: Styling framework configured in tailwind.config.js
- **Vite**: Asset bundler configured in vite.config.js

### Database Configuration

- Default connection: SQLite (`database/database.sqlite`)
- Sessions stored in database
- Queue connection uses database
- Cache store uses database
- Test environment uses in-memory SQLite (`:memory:`)

### Frontend Build

- Entry points: `resources/css/app.css`, `resources/js/app.js`
- Vite watches for changes in `.blade.php` files
- Tailwind scans `resources/views/**/*.blade.php` for classes
- Custom font: Figtree (defined in Tailwind config)

### Testing Configuration

- Uses Pest PHP with Laravel plugin
- Feature tests automatically use `RefreshDatabase` trait
- Test database uses in-memory SQLite
- Custom expectation: `toBeOne()` available globally
- PHPUnit configuration in `phpunit.xml`

### Routing Pattern

Routes in `web.php` use both traditional view routing and Livewire component routing:
```php
// View routing
Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified']);

// Livewire component routing
Route::view('/profile-update', 'profile')->middleware(['auth']);
```

Authentication routes are defined separately in `routes/auth.php` and included via `require __DIR__.'/auth.php'`.

## Initial Setup

If setting up the project from scratch:
```bash
composer setup
```

This runs: composer install, copies .env, generates app key, runs migrations, installs npm packages, and builds assets.
