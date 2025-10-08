# Task 1: Upgrade Laravel Project to Version 12

## Overview
Upgraded the backend from Laravel 8.65 to Laravel 12.29.0 to ensure latest features, security fixes, and compatibility.

## What was Done
- Upgraded Laravel framework (8.65 → 12.29.0).
- Updated PHP version to 8.2.29.
- Removed deprecated packages:
  - fruitcake/laravel-cors
  - facade/ignition
- Added/Updated packages:
  - spatie/laravel-ignition (^2.4)
  - phpunit/phpunit (^10.5)
- Replaced `Fruitcake\Cors\HandleCors` with `Illuminate\Http\Middleware\HandleCors`.
- Verified the app runs successfully after upgrade.

## Testing
- Ran `php artisan serve` → application booted without errors.
- Checked UI endpoints (login, articles) → all worked as expected.

## Notes
- `main` branch left clean.
- Changes available in `upgrade-laravel-12` branch with open PR.
