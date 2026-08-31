# MentorChai - Virtual Mentorship Platform

🔗 **Live Demo: https://mentorchai-production-cdw3if.laravel.cloud/**

A web-based virtual mentorship platform supporting real-time features for both mentors and students simultaneously. This platform is designed to facilitate flexible, short-time based virtual sessions to make education more accessible and affordable for everyone.

## Project Description

This Laravel application enables seamless interaction between mentors and students through:
* Real-time communication features
* Simultaneous mentor and student support
* Flexible session scheduling
* Enhanced educational accessibility
* Cost-effective virtual learning solutions

## System Design & Architecture

MentorChai is built on a scalable, three-tier architecture ensuring secure data flow, efficient session management, and robust third-party integrations.

### 1. Three-Tier Architecture
* **Client Presentation Tier:** Built with HTML5, Tailwind CSS v4, DaisyUI, and JavaScript utilizing a Teal and Blue color palette. Includes a separate dedicated Admin panel.
* **Backend Engine Tier:** Powered by PHP-Laravel, handling core business logic including OAuth authentication, user roles, mentor matching, session booking, push notifications, secure 1-to-1 live sessions, and review systems.
* **Data Storage & Infrastructure Tier:** Hosted on Laravel Cloud, utilizing a MySQL database (16 structured tables), OAuth2 (GitHub/Google), and third-party APIs (SSLCommerz for payments, ZegoCloud for Live video session and Mailtrap for e-mail verification).

<img width="1280" height="720" alt="Slide1" src="https://github.com/user-attachments/assets/a349c523-8f0a-4249-b709-895bfa6443b4" />

### 2. Data Flow & Core Processes
The system relies on distinct process modules to handle user journeys from end to end:
* **Auth & Profile:** Handles student/mentor logins, role assignments, and OAuth provisioning.
* **Session Management:** Covers mentor search, selection, booking requests, and approvals.
* **External Integrations:** Secure checkout via **SSLCommerz** and live video token generation via **ZegoCloud**.
* **Post-Session Loop:** Manages automated alerts, delivery logs, and post-session rating/feedback processing.

**Level 0 Context Diagram:**
<img width="1280" height="720" alt="DFD Level 0" src="https://github.com/user-attachments/assets/3836b1b0-1144-4014-ab56-c1f8b4955705" />

**Level 1 Data Flow Diagram:**
<img width="1280" height="720" alt="DFD Level 1" src="https://github.com/user-attachments/assets/8d0180f4-de76-42b4-9c51-6f5705bafbb9" />

### 3. Request Lifecycle
Incoming HTTPS requests are routed through an Nginx web server and forwarded via PHP-FPM to the Laravel application. The application verifies authentication via Eloquent, calls necessary external APIs (OAuth, SSLCommerz, Zego), writes bookings or transactions to MySQL, and renders the final Blade/JSON response back to the client.

<img width="1280" height="720" alt="Communication Flow of the System" src="https://github.com/user-attachments/assets/87521533-5a75-46fc-a714-32f095960f0a" />

### 4. Database Schema (ERD)
The relational database is structured across 16 primary tables. Key entities include `users` and `profiles` (managing roles and verification), `mentoring_sessions` and `session_topics` (handling schedules and durations), and `payments` and `reviews` (tracking financial transactions and platform feedback).

<img width="1637" height="1294" alt="MySQL ERD of MentorChai" src="https://github.com/user-attachments/assets/b794ed50-2498-4e93-b8de-1cd0037db66f" />

## Getting Started

### Prerequisites

Before you begin, ensure you have the following installed on your system:
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL
- Git

### Clone the Repository

```bash
git clone https://github.com/Mr-Explorer142/MentorChai.git
cd <project-directory-name>
```

## Setup Instructions

### 1. Install PHP Dependencies

```bash
composer install
```

### 2. Install Node Dependencies

```bash
npm install
```

### 3. Environment Configuration

Create a copy of the `.env.example` file:

```bash
cp .env.example .env
```

Update the `.env` file with your database credentials and other configuration settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Run Database Migrations

```bash
php artisan migrate
```

If you have seeders, you can run:

```bash
php artisan db:seed
```

Or run migrations with seeders together:

```bash
php artisan migrate --seed
```

### 6. Create Storage Symlink

```bash
php artisan storage:link
```

### 7. Build Frontend Assets

For development:

```bash
npm run dev
```

For production:

```bash
npm run build
```

### 8. Start the Development Server

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Additional Commands

### Clear Cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Run Tests

```bash
php artisan test
```

### Queue Workers (if using queues)

```bash
php artisan queue:work
```

## Tech Stack & Tools

- **Frontend**: HTML, Tailwind CSS, Daisy UI, JavaScript
- **Backend**: PHP-Laravel
- **Database**: MySQL
- **Version Control System**: Git & GitHub 
- **Notification System**: Laravel Echo and Pusher 
- **Email Verification Platform**: MailTrap
- **Video Calling API kit**: ZegoCloud 
- **Payment Gateway**: SSLCommerz(Sandbox)
- **Package Manager**: Composer, NPM
- **Testing Framework**: PHPUnit
- **Hosting and Cloud platform**: Laravel Cloud

## 📂 Project Structure

```
├── app/                    # Application core files
├── bootstrap/              # Bootstrap files
├── config/                 # Configuration files
├── database/              # Migrations and seeders
├── public/                # Public assets
├── resources/             # Views, raw assets
├── routes/                # Route definitions
├── storage/               # Storage files
├── tests/                 # Test files
└── vendor/                # Composer dependencies
```


---
