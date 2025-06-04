# Shopping-Cart-Management-System
## (Web3 Application)

A comprehensive shopping cart management system built with PHP, MySQL, and modern web technologies. This system provides seamless browsing, purchasing, and secure transaction capabilities for users, along with robust admin management features.

## Features

### User Features
- **Product Browsing**: Browse products by categories with detailed product views
- **Shopping Cart**: Add/remove items, manage quantities
- **User Authentication**: Secure signup, login, and password management
- **Order Management**: Place orders, track order status, view order history
- **Profile Management**: Update personal information and change passwords
- **Invoice Generation**: Generate and download order invoices

### Admin Features
- **Product Management**: Add, edit, delete, and manage product inventory
- **Order Tracking**: Monitor and update order statuses
- **Report Generation**: Generate sales and inventory reports
- **User Management**: Manage customer accounts and orders

## Technology Stack

- **Backend**: PHP 7.4+
- **Database**: MySQL 8.0+
- **Server**: Apache (via XAMPP)
- **Frontend**: HTML5, CSS3, JavaScript
- **Styling**: Bootstrap, Custom CSS
- **Architecture**: MVC Pattern

## Prerequisites

Before running this application, ensure you have the following installed:

- [XAMPP](https://www.apachefriends.org/) (PHP 7.4+ and MySQL)
- Web browser (Chrome, Firefox, Safari, etc.)
- Text editor or IDE (VS Code, Sublime Text, etc.)

## Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/Abdulla-1234/Shopping-Cart-Management-System.git
cd shopping-cart-management-system
```

### 2. Start XAMPP Services

```bash
# Start XAMPP Control Panel
sudo /opt/lampp/lampp start

# Or start individual services
sudo /opt/lampp/bin/mysql.server start
sudo /opt/lampp/bin/apache start
```

**For Windows:**
```cmd
# Navigate to XAMPP installation directory
cd C:\xampp
# Start services
xampp-control.exe
```

### 3. Setup Project Directory

```bash
# Copy project to XAMPP htdocs directory
cp -r . /opt/lampp/htdocs/OFSMS/

# For Windows
xcopy . C:\xampp\htdocs\OFSMS\ /E /I
```

### 4. Database Setup

```bash
# Access MySQL via command line
mysql -u root -p

# Or use phpMyAdmin at: http://localhost/phpmyadmin
```

**Create Database:**
```sql
CREATE DATABASE ofsmsdb;
USE ofsmsdb;
SOURCE /path/to/your/project/ofsmsdb.sql;
```

**Alternative using phpMyAdmin:**
1. Open `http://localhost/phpmyadmin`
2. Create new database named `ofsmsdb`
3. Import the `ofsmsdb.sql` file

### 5. Configure Database Connection

Edit the database configuration file (usually in `includes/config.php`):

```php
<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'ofsmsdb';
?>
```

## Running the Application

### Start the Development Server

```bash
# Ensure XAMPP services are running
sudo /opt/lampp/lampp status

# Access the application
# User Interface: http://localhost/OFSMS/
# Admin Panel: http://localhost/OFSMS/admin/
```

### Command Line Operations

**Check Apache Status:**
```bash
sudo /opt/lampp/bin/httpd -t
```

**Check MySQL Status:**
```bash
sudo /opt/lampp/bin/mysql.server status
```

**View Apache Logs:**
```bash
tail -f /opt/lampp/logs/error_log
```

**Restart Services:**
```bash
sudo /opt/lampp/lampp restart
```

## Project Structure

```
OFSMS/
├── admin/                  # Admin panel files
│   ├── CSS/               # Admin stylesheets
│   ├── fonts/             # Font files
│   ├── images/            # Admin images
│   ├── includes/          # Admin includes
│   └── js/                # Admin JavaScript
├── CSS/                   # User interface stylesheets
├── fonts/                 # Font files
├── images/                # User interface images
├── includes/              # PHP includes and configuration
├── js/                    # JavaScript files
├── about-us.php           # About us page
├── cancelorder.php        # Order cancellation
├── cart.php               # Shopping cart page
├── category-details.php   # Category listing
├── change-password.php    # Password change functionality
├── contact-us.php         # Contact page
├── forgot-password.php    # Password recovery
├── index.php              # Homepage
├── invoice.php            # Invoice generation
├── logout.php             # User logout
├── my-order.php           # User order history
├── order-detail.php       # Order details view
├── products.php           # Product listing
├── profile.php            # User profile management
├── signup.php             # User registration
├── single-product-detail.php # Product detail view
├── trackorder.php         # Order tracking
├── ofsmsdb.sql           # Database schema
└── README.md             # This file
```

## Default Login Credentials

### Admin Access
- **URL**: `http://localhost/OFSMS/admin/`
- **Username**: `admin`
- **Password**: `admin123`

### Test User Account
- **Username**: `testuser`
- **Password**: `test123`

## Development Commands

### Database Operations
```bash
# Backup database
mysqldump -u root -p ofsmsdb > backup.sql

# Restore database
mysql -u root -p ofsmsdb < backup.sql

# Connect to MySQL
mysql -u root -p ofsmsdb
```

### File Permissions (Linux/Mac)
```bash
# Set proper permissions
chmod -R 755 /opt/lampp/htdocs/OFSMS/
chmod -R 644 /opt/lampp/htdocs/OFSMS/*.php
```

### Debugging
```bash
# Enable PHP error reporting
echo "error_reporting = E_ALL" >> /opt/lampp/etc/php.ini
echo "display_errors = On" >> /opt/lampp/etc/php.ini

# Restart Apache
sudo /opt/lampp/lampp restart
```

## Configuration

### PHP Configuration
Edit `/opt/lampp/etc/php.ini`:
```ini
max_execution_time = 300
memory_limit = 256M
upload_max_filesize = 50M
post_max_size = 50M
```

### Apache Configuration
Edit `/opt/lampp/etc/httpd.conf` if needed for custom configurations.

## Troubleshooting

### Common Issues

1. **Port 80 already in use:**
   ```bash
   sudo lsof -i :80
   sudo kill -9 <PID>
   ```

2. **MySQL won't start:**
   ```bash
   sudo /opt/lampp/bin/mysql.server stop
   sudo /opt/lampp/bin/mysql.server start
   ```

3. **Permission denied errors:**
   ```bash
   sudo chown -R $(whoami) /opt/lampp/htdocs/OFSMS/
   ```

4. **Database connection failed:**
   - Check MySQL service status
   - Verify database credentials in config file
   - Ensure database exists

## API Endpoints

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/index.php` | GET | Homepage |
| `/products.php` | GET | Product listing |
| `/cart.php` | GET/POST | Shopping cart |
| `/signup.php` | POST | User registration |
| `/admin/` | GET | Admin dashboard |

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Author

**Your Name**
- GitHub: [@yourusername](https://github.com/Abdulla-1234)
- Email: mohammadabdulla20march@gmail.com

## Acknowledgments

- XAMPP development team
- PHP community
- Bootstrap framework
- MySQL database system
---

**Made with ❤️ using PHP, MySQL, and XAMPP**
