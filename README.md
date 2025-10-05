# AbSiDee

AbSiDee is a PHP-based web application designed for modularity and extensibility. It includes user authentication and a flexible API backend powered by the FlexiAPI framework.

## Project Structure

- `composer.json`, `composer.lock`: Composer configuration files for dependency management.
- `config/`: Application configuration files.
- `helpers/`: Helper functions for authentication and API utilities.
- `public/`: Publicly accessible PHP files (entry points, layouts, authentication pages).
- `vendor/`: Composer-managed dependencies.
- `gecille-uptura/flexiapi/`: Submodule for FlexiAPI, a modular API framework.

## Prerequisites

- PHP 7.4 or higher
- Composer (PHP dependency manager)
- MySQL or compatible database
- Web server (Apache, Nginx, or built-in PHP sserver)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-repo/AbSiDee.git
   cd AbSiDee
   ```

2. Install PHP dependencies using Composer:
   ```bash
   composer install
   ```

3. Configure the database and API settings:
   - Edit `config/config.php` to set your database connection details and API key.
   - Example:
     ```php
     return [
         'db' => [
             'driver' => 'mysql',
             'host' => '127.0.0.1',
             'database' => 'absidee_db',
             'username' => 'your_db_user',
             'password' => 'your_db_password',
             'charset' => 'utf8mb4',
             'whitelist_tables' => ['users', 'products', 'deleted_users'],
         ],
         'api' => [
             'key' => 'your-secret-token',
             'max_limit' => 100,
             'default_limit' => 20,
         ]
     ];
     ```

4. Set up your database schema:
   - Create the database specified in the config.
   - Create the necessary tables (e.g., `users`) according to your application needs.
   - You may use FlexiAPI or your own SQL scripts to create tables.

## Running the Application

- Configure your web server to serve the `public/` directory as the document root.
- Alternatively, use PHP's built-in server for development:
  ```bash
  php -S localhost:8000 -t public
  ```
- Access the app in your browser at `http://localhost:8000`.

## User Authentication

- **Sign Up:** Visit `/signup.php` to create a new user account.
- **Sign In:** Visit `/signin.php` to log in with your credentials.
- **Dashboard:** After login, you will be redirected to the dashboard (`index.php`).
- **Logout:** Use the logout link to end your session (`logout.php`).

## API Usage

- The API entry point is `public/api.php`.
- The app uses FlexiAPI, a modular API framework, for database operations.
- Use the helper function `flexiapi_request()` in `helpers/flexiapi_helper.php` to interact with the API.
- API requests require the `X-FlexiAPI-Key` header with the configured API key.

## Customization

- Modify configuration files in `config/` to adjust database and API settings.
- Extend or customize API controllers and services in the `gecille-uptura/flexiapi` submodule.

## Troubleshooting

- Ensure your database credentials in `config/config.php` are correct.
- Check that the web server document root points to the `public/` directory.
- Verify that PHP extensions like cURL and PDO are enabled.
- Review browser console logs for debugging information injected by the app.

## License

Refer to individual `LICENSE` files for license details.

## Author

- gecille87
