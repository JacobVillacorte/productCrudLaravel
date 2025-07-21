# Product Management System - Laravel Livewire SPA

A modern, single-page application (SPA) built with Laravel 12 and Livewire 3 for managing product inventory. This application features seamless navigation, real-time updates, and a responsive design.

## Features

### 🔐 Authentication System
- **Livewire-powered login/registration** with real-time validation
- **SPA navigation** - no page refreshes during authentication
- **Session management** with secure logout

### 📦 Product Management
- **Complete CRUD operations** for products
- **Image upload and preview** functionality
- **Real-time form validation**
- **Modal-based creation and editing**
- **Responsive product grid view**
- **Detailed product view modal**

### 🚀 Modern SPA Experience
- **Wire:navigate** for seamless page transitions
- **No page refreshes** - everything happens in real-time
- **Loading states** and user feedback
- **Responsive Bootstrap 5 design**
- **Clean and intuitive UI**

## Technology Stack

- **Laravel 12** - Backend framework
- **Livewire 3** - Full-stack framework for dynamic interfaces
- **Bootstrap 5** - Responsive CSS framework
- **Bootstrap Icons** - Icon library
- **MySQL** - Database
- **PHP 8.2+** - Programming language

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/JacobVillacorte/productCrudLaravel.git
   cd productCrudLaravel
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database configuration**
   - Configure your database settings in `.env`
   - Run migrations:
   ```bash
   php artisan migrate
   ```

5. **Storage setup**
   ```bash
   php artisan storage:link
   ```

6. **Start development server**
   ```bash
   php artisan serve
   ```

## Project Structure

### Livewire Components

```
app/Livewire/
├── Auth/
│   ├── Login.php          # Login component
│   └── Register.php       # Registration component
├── Navigation.php         # Navigation with logout
└── Products.php          # Main product management
```

### Views

```
resources/views/
├── layouts/
│   ├── app.blade.php      # Main app layout
│   └── guest.blade.php    # Guest layout for auth
└── livewire/
    ├── auth/
    │   ├── login.blade.php
    │   └── register.blade.php
    ├── navigation.blade.php
    └── products.blade.php
```

## Features in Detail

### SPA Navigation
- Uses Livewire's `wire:navigate` for seamless transitions
- No page refreshes when moving between sections
- Maintains state across navigation

### Image Handling
- **Upload preview** before saving
- **Automatic storage** in `storage/app/public/products/`
- **Responsive images** with proper aspect ratios
- **Fallback display** for products without images

### Real-time Validation
- **Client-side validation** feedback
- **Server-side validation** with proper error display
- **Visual feedback** with Bootstrap styling

### Responsive Design
- **Mobile-first** approach
- **Grid system** that adapts to screen size
- **Touch-friendly** interface elements

## API Endpoints (Livewire)

All interactions happen through Livewire components without traditional API endpoints:

- **Authentication**: Login/Register components handle auth flows
- **Product CRUD**: Products component handles all product operations
- **File uploads**: Handled automatically by Livewire

## Security Features

- **CSRF protection** on all forms
- **Authentication middleware** for protected routes
- **File upload validation** for images
- **SQL injection protection** through Eloquent ORM

## Performance Optimizations

- **Lazy loading** for large product lists
- **Optimized images** with proper sizing
- **Minimal JavaScript** - mostly handled by Livewire
- **Efficient database queries** with Eloquent

## Browser Compatibility

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## Support

For support, email jacob@example.com or create an issue on GitHub.

---

**Built with ❤️ using Laravel and Livewire**

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

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
