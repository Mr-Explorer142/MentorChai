# Virtual Mentorship Platform

A web-based virtual mentorship platform supporting real-time features for both mentors and students simultaneously. This platform is designed to facilitate flexible, short-time based virtual sessions to make education more accessible and affordable for everyone.

## 📋 Project Description

This Laravel application enables seamless interaction between mentors and students through:
- Real-time communication features
- Simultaneous mentor and student support
- Flexible session scheduling
- Enhanced educational accessibility
- Cost-effective virtual learning solutions

## 🚀 Getting Started

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

## ⚙️ Setup Instructions

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

## 🔄 Pushing Changes to Repository

### First Time Setup

1. Initialize git (if not already done):
```bash
git init
```

2. Add remote repository:
```bash
git remote add origin <your-repository-url>
```

### Regular Workflow

1. Check current status:
```bash
git status
```

2. Add files to staging:
```bash
git add .
```

Or add specific files:
```bash
git add <file-name>
```

3. Commit your changes:
```bash
git commit -m "Your descriptive commit message"
```

4. Pull latest changes (recommended before pushing):
```bash
git pull origin main
```

5. Push your changes:
```bash
git push origin main
```

## 📝 Additional Commands

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

## 🛠️ Tech Stack & Tools

- **Frontend**: HTML, Tailwind CSS(DaisyUI), JavaScript
- **Backend**: PHP-Laravel
- **Database**: MySQL
- **Version Control System**: Git & GitHub 
- **Notification System**: Laravel Echo and Pusher 
- **Email Verification Platform**: MailTrap
- **Video Calling API kit**: ZegoCloud 
- **Payment Gateway**: SSLCommerz(Sandbox), PathaoPay(Real time transaction)
- **Package Manager**: Composer, NPM

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

**Note**: Make sure to keep your `.env` file secure and never commit it to version control. The `.gitignore` file is configured to exclude it by default.
