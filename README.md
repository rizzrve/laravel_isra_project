### ISRA - Information Security Risk Assessment by Diaspora SDN BHD

## Project Overview
ISRA is a comprehensive Information Security Risk Assessment tool developed by Diaspora SDN BHD. It is built using the Laravel framework and utilizes MySQL as its database. The project aims to provide a robust platform for assessing and managing information security risks.

## Prerequisites
- PHP >= 7.3
- Composer
- MySQL
- XAMPP (for Windows)
- Apache/Nginx (for Linux)
- Git

## Installation

### Windows 11

1. **Install XAMPP:**
   - Download and install XAMPP from [Apache Friends](https://www.apachefriends.org/index.html).
   - Start Apache and MySQL from the XAMPP Control Panel.

2. **Install Composer:**
   - Download and install Composer from [getcomposer.org](https://getcomposer.org/).

3. **Clone the Repository:**
   ```sh
   git clone https://github.com/your-repo/ISRA.git
   cd ISRA
   ```

4. **Install Laravel Dependencies:**
   ```sh
   composer install
   ```

5. **Environment Setup:**
   ```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=test_project
    DB_USERNAME=root
    DB_PASSWORD=
   ```
   - Update the environment variables

6. **Generate Application Key:**
   ```sh
   php artisan key:generate
   ```

7. **Run Migrations:**
   ```sh
   php artisan migrate
   ```

8. **Run the Application:**
   ```sh
   php artisan serve
   ```
   - Access the application at `http://localhost:8000`.

### Linux

1. **Install Apache/Nginx, MySQL, and PHP:**
   - For Apache:
     ```sh
     sudo apt update
     sudo apt install apache2
     ```
   - For MySQL:
     ```sh
     sudo apt install mysql-server
     ```
   - For PHP:
     ```sh
     sudo apt install php libapache2-mod-php php-mysql
     ```

2. **Install Composer:**
   ```sh
   sudo apt update
   sudo apt install curl php-cli php-mbstring git unzip
   curl -sS https://getcomposer.org/installer | php
   sudo mv composer.phar /usr/local/bin/composer
   ```

3. **Clone the Repository:**
   ```sh
   git clone https://github.com/your-repo/ISRA.git
   cd ISRA
   ```

4. **Install Laravel Dependencies:**
   ```sh
   composer install
   ```

5. **Environment Setup:**
   ```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=test_project
    DB_USERNAME=root
    DB_PASSWORD=
   ```
   - Update the environment variables

6. **Generate Application Key:**
   ```sh
   php artisan key:generate
   ```

7. **Run Migrations:**
   ```sh
   php artisan migrate
   ```

8. **Run the Application:**
   ```sh
   php artisan serve
   ```
   - Access the application at `http://localhost:8000`.

## Optional: PHPMyAdmin Setup

### Windows 11
- PHPMyAdmin is included with XAMPP. Access it at `http://localhost/phpmyadmin`.

### Linux
1. **Install PHPMyAdmin:**
   ```sh
   sudo apt install phpmyadmin
   ```
2. **Configure Apache to Include PHPMyAdmin:**
   ```sh
   sudo phpenmod mbstring
   sudo systemctl restart apache2
   ```
3. **Access PHPMyAdmin:**
   - Visit `http://localhost/phpmyadmin`.

## Conclusion
Follow the above steps to set up and run the ISRA project on both Windows and Linux systems. For any issues, refer to the Laravel and XAMPP documentation.
