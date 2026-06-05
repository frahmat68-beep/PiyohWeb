<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## Data Audit & Fixes (Latest Update)

###  CompletedStatus: 

**Date:** June 6, 2026

### What Was Fixed:

#### 1. **Logo Implementation** 
- Added public logo file path to settings: `public/Logo/PK-LOGOTYPE.png`
- Updated navbar and footer to display logo with fallback to text "Piyoh Kopi"
- Logo is now dynamically loaded from `Setting` model

#### 2. **Outlet Data Cleanup** 
- **Galaxy Outlet:** Updated with verified public data
  - Location: Jaka Setia, Bekasi Selatan (NOT Pekanbaru)
  - Address: Jalan Lotus Timur. RSO D No. 31, RT.004/RW.019
  - Contact: 0812-3999-9731 (WhatsApp: 6281239999731)
  - Operating Hours: 08:00 - 23:30 WIB Daily
  
- **Bekasi Outlet:** Set as pending validation
  - `is_active = false` - not displayed on website yet
  - Address: "Menunggu konfirmasi alamat resmi"
  - Contact info: empty (null)
  - Ready for client to confirm and update

#### 3. **Copywriting Fixes** 
- Removed dummy claims: "Berdiri sejak 2020", "Galaxy Pekanbaru", random phone numbers
- Updated brand voice to match reality: coffee shop, manual brew, pastry, takeaway
- All page content now reflects verified business information

#### 4. **Menu System Added** 
- Created 6 menu categories:
  - Coffee (8 items)
  - Non Coffee (6 items)
  - Mocktail (3 items)
  - Tea (3 items)
  - Paket Kumpul (3 items)
  - Pastry (4 items)
  - **Total: 27 menu items**

- All items attached to Galaxy outlet only
- Bekasi outlet menu will be added after data validation

#### 5. **Contact Information** 
- Updated all contact references to use Galaxy outlet data
- Footer now shows correct phone and WhatsApp
- Instagram links correctly point to @piyohkopi

#### 6. **Security** 
- Admin password changed from default `admin123` to secure random hash
- No sensitive data committed to repository
- `.env` file excluded from version control

#### 7. **Database Structure Ready for Second Branch** 
- Bekasi outlet record created as template for client
- Menu category/item structure supports multiple outlets
- Pivot table ready for outlet-specific menu availability

### Important Notes:

 **Menu & Pricing Validation:**
> The menu data and pricing are based on previous public references and **MUST** be verified with Piyoh Kopi management before going to production. Prices and available items may have changed.

 **Second Outlet (Bekasi):**
> The Bekasi outlet is currently marked as inactive. Client must confirm:
> - Official outlet name
> - Complete address and coordinates  
> - Operating hours
> - Contact information
> - Menu availability (same as Galaxy or different?)

### Files Modified:
- `database/seeders/OutletSeeder.php` - Real outlet data
- `database/seeders/PageSeeder.php` - Updated copywriting
- `database/seeders/SettingSeeder.php` - Added site_logo setting
- `database/seeders/MenuCategorySeeder.php` - NEW: Menu categories
- `database/seeders/MenuItemSeeder.php` - NEW: Menu items
- `database/seeders/DatabaseSeeder.php` - Added menu seeder calls
- `resources/views/layouts/app.blade.php` - Logo integration

### Next Steps for Client:
1. Verify Galaxy outlet details are accurate
2. Confirm Bekasi outlet information and decide on launch timeline
3. Validate menu items and pricing (update as needed via CMS)
4. Test logo display across all devices
5. Confirm all social media links are correct

### Running Seeders Individually:
```bash
php artisan db:seed --class=SettingSeeder
php artisan db:seed --class=OutletSeeder
php artisan db:seed --class=PageSeeder
php artisan db:seed --class=MenuCategorySeeder
php artisan db:seed --class=MenuItemSeeder
```

 Note: Do NOT run `php artisan migrate:fresh` in production as it will delete manual data entered through CMS.

---
