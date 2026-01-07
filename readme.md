# SnapRecruit - AI-Powered Recruitment CRM

**SnapRecruit** is a modern Applicant Tracking System (ATS) designed to streamline the hiring process. It demonstrates a robust, scalable architecture using the **VILT Stack** (Vue, Inertia, Laravel, Tailwind), featuring AI-driven resume analysis, role-based access control, and asynchronous background processing.

This project serves as a portfolio showcase for **System Architecture**, **Clean Code principles**, and **AI Integration** within a PHP ecosystem.

---

## 🚀 Key Technical Highlights

- **Modern Monolith Architecture**: Utilizes Inertia.js to build a modern Single Page Application (SPA) without the complexity of a separate client-side API.

- **AI Integration**: Implements OpenAI API to automatically parse candidate resumes and generate "Key Skill Summaries" and "Culture Fit" scores.

- **Scalability & Queues**: Uses Laravel Jobs/Queues (Redis) to handle heavy tasks (e.g., email notifications, report generation) asynchronously, ensuring a non-blocking UI.

- **Solid API Design**: Exposes a versioned RESTful API (`/api/v1`) with Resources and rate limiting, suitable for external integrations.

- **Role-Based Access Control (RBAC)**: Granular permission management (Admin vs. Recruiter) using Spatie Permissions.

- **Testing**: Comprehensive feature and unit tests using PestPHP/PHPUnit to ensure reliability.

---

## 🛠 Tech Stack

### Backend
- **Framework**: Laravel 11
- **Database**: MySQL 8.0
- **Queue Driver**: Redis
- **Architecture**: Service-Repository Pattern (to ensure thin controllers and reusable logic)

### Frontend
- **Framework**: Vue.js 3 (Composition API)
- **Glue**: Inertia.js
- **Styling**: Tailwind CSS v3
- **Components**: Headless UI / Heroicons

### DevOps & Tools
- **Environment**: Laravel Sail (Docker)
- **Testing**: Pest PHP
- **Linting**: Laravel Pint

---

## ✨ Core Features

### 1. Interactive Kanban Board (UX/UI Showcase)
A drag-and-drop interface for managing candidate pipelines.
- Visual stage management (Applied → Screening → Interview → Offer).
- Real-time status updates using Vue.js reactivity.

### 2. AI Resume Analyst (Modern Tech)
Automated insights for recruiters.
- **Action**: When a PDF resume is uploaded, a Service Class triggers an API call to OpenAI.
- **Result**: Extracts structured data (Years of Experience, Top Skills) and saves it to the database JSON column.

### 3. Automated Communication (Backend Engineering)
Event-driven architecture: When a candidate is moved to the "Hired" stage, a `CandidateHired` event is fired.
- **Listeners** queue a Welcome Email job to be sent via SMTP/Mailgun.

### 4. Public Job Board API (Data Engineering)
- **Public endpoint**: `GET /api/v1/jobs`
- Includes filtering, pagination, and API Resource transformation to hide internal database structure.

---

## 📸 Screenshots
_(To be added)_
- Dashboard View
- Kanban Drag-and-Drop
- AI Analysis Result Modal

---

## ⚙️ Installation & Setup

This project uses **Laravel Sail** (Docker) for development. Follow these beginner-friendly steps:

### Prerequisites

Before you begin, make sure you have installed:
- **Docker Desktop**: [Download here](https://www.docker.com/products/docker-desktop/)
  - Windows: Docker Desktop for Windows
  - Mac: Docker Desktop for Mac
  - Linux: Docker Engine
- **Git**: [Download here](https://git-scm.com/downloads)

> **Note**: You don't need PHP, Composer, MySQL, or Node.js installed locally! Docker handles everything.

---

### Quick Start (5 minutes)

#### 1. Clone the Repository

Open your terminal and run:

```bash
git clone https://github.com/yourusername/snaprecruit.git
cd snaprecruit
```

#### 2. Copy Environment File

```bash
# On Mac/Linux:
cp .env.example .env

# On Windows (Command Prompt):
copy .env.example .env

# On Windows (PowerShell):
Copy-Item .env.example .env
```

The `.env` file is already configured with default settings. **You can use it as-is for local development!**

#### 3. Install PHP Dependencies (via Docker)

This command uses Docker to install Composer dependencies without needing PHP on your machine:

```bash
# On Mac/Linux:
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install

# On Windows (PowerShell):
docker run --rm -v ${PWD}:/var/www/html -w /var/www/html laravelsail/php82-composer:latest composer install

# On Windows (Command Prompt):
docker run --rm -v %cd%:/var/www/html -w /var/www/html laravelsail/php82-composer:latest composer install
```

> **This step might take 2-3 minutes the first time as it downloads packages.**

#### 4. Start Docker Containers

Start MySQL, Redis, and the Laravel application:

```bash
./vendor/bin/sail up -d
```

> **First-time startup might take 5-10 minutes** as Docker downloads images for MySQL, Redis, and PHP.
>
> The `-d` flag runs containers in the background (detached mode).

**How to check if containers are running:**
```bash
./vendor/bin/sail ps
```

You should see containers for `laravel.test`, `mysql`, and `redis` with status "Up".

#### 5. Generate Application Key

```bash
./vendor/bin/sail artisan key:generate
```

#### 6. Create Database Tables

Run migrations to create the database schema:

```bash
./vendor/bin/sail artisan migrate
```

You'll see output showing tables being created:
- ✓ users
- ✓ jobs
- ✓ candidates
- ✓ applications

**Optional**: Seed with sample data (recommended for testing):
```bash
./vendor/bin/sail artisan db:seed
```

This creates:
- Admin user: `admin@snaprecruit.com` / `password`
- Recruiter user: `recruiter@snaprecruit.com` / `password`
- Sample job postings and candidates

#### 7. Install Frontend Dependencies

```bash
./vendor/bin/sail npm install
```

#### 8. Start the Development Server

In a **new terminal window**, start Vite (compiles Vue.js and Tailwind CSS):

```bash
./vendor/bin/sail npm run dev
```

Keep this terminal running! It will hot-reload your changes.

#### 9. Open in Browser

🎉 **You're ready!** Open [http://localhost](http://localhost) in your browser.

You should see the SnapRecruit welcome page.

---

### Daily Development Workflow

Once everything is set up, you only need these two commands each day:

**Terminal 1** - Start Docker containers:
```bash
./vendor/bin/sail up
```

**Terminal 2** - Start Vite dev server:
```bash
./vendor/bin/sail npm run dev
```

**When done working:**
```bash
./vendor/bin/sail down
```

---

### Useful Commands

```bash
# View logs
./vendor/bin/sail logs

# Run PHP Artisan commands
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan make:controller CandidateController

# Run Composer commands
./vendor/bin/sail composer require package-name

# Run NPM commands
./vendor/bin/sail npm install package-name

# Access MySQL database
./vendor/bin/sail mysql

# Run tests
./vendor/bin/sail artisan test

# Stop all containers
./vendor/bin/sail down

# Rebuild containers (after changing docker-compose.yml)
./vendor/bin/sail build --no-cache
```

---

### Optional: Set OpenAI API Key (for AI Resume Analysis)

To enable AI-powered resume analysis:

1. Get an API key from [OpenAI Platform](https://platform.openai.com/api-keys)
2. Edit `.env` and add your key:
   ```env
   OPENAI_API_KEY=sk-your-actual-api-key-here
   ```
3. Restart containers:
   ```bash
   ./vendor/bin/sail down
   ./vendor/bin/sail up -d
   ```

> **Note**: The application works without this! AI features will be disabled if no key is provided.

---

### Troubleshooting

**Port 80 already in use?**
```bash
# Edit compose.yaml and change:
# ports: ["80:80"] to ports: ["8000:80"]
# Then access at http://localhost:8000
```

**"sail" command not found?**
```bash
# Make sure you're in the project directory
cd snaprecruit

# If still not working, use the full path:
./vendor/bin/sail up
```

**Containers won't start?**
- Make sure Docker Desktop is running
- Check for port conflicts: `docker ps`
- Try: `./vendor/bin/sail down && ./vendor/bin/sail up -d`

**Database connection errors?**
- Wait 30 seconds after `sail up` for MySQL to fully start
- Check logs: `./vendor/bin/sail logs mysql`

**Vite errors or blank screen?**
```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
```

---

### Access Points

Once running, you can access:

| Service | URL | Notes |
|---------|-----|-------|
| **Application** | http://localhost | Main application |
| **MySQL** | localhost:3306 | DB: `snaprecruit`, User: `sail`, Pass: `password` |
| **Redis** | localhost:6379 | No password required |
| **Mailpit** | http://localhost:8025 | View test emails |

---

### Alternative Setup (Without Docker)

If you prefer traditional setup with local PHP/MySQL:

**Requirements:**
- PHP 8.2+
- Composer
- MySQL 8.0+
- Node.js 18+
- Redis (optional)

```bash
# 1. Install dependencies
composer install
npm install

# 2. Setup environment
cp .env.example .env
php artisan key:generate

# 3. Update .env for local database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=snaprecruit
DB_USERNAME=root
DB_PASSWORD=your_mysql_password

# 4. Create database
mysql -u root -p -e "CREATE DATABASE snaprecruit"

# 5. Run migrations
php artisan migrate --seed

# 6. Start servers (in separate terminals)
php artisan serve    # Terminal 1
npm run dev          # Terminal 2
```

Then visit: http://localhost:8000

---

## 🧪 Running Tests

Code quality is ensured via automated testing.

```bash
# Run all tests
./vendor/bin/sail artisan test

# Run with coverage
./vendor/bin/sail artisan test --coverage

# Run strict type checking (optional)
./vendor/bin/sail phpstan analyse
```

---

## 📂 Project Structure (Key Directories)

```
app/
├── Services/           # Business logic (e.g., AiAnalysisService.php)
├── Repositories/       # Data access layer
├── Http/
│   ├── Controllers/    # Thin controllers, delegating to Services
│   ├── Resources/      # API JSON transformations
│   ├── Requests/       # Form validation
├── Jobs/               # Queued jobs (e.g., SendWelcomeEmail.php)
├── Events/             # Application events
├── Listeners/          # Event listeners
├── Models/             # Eloquent models

resources/
├── js/
│   ├── Pages/          # Vue.js Inertia pages
│   ├── Components/     # Reusable Vue components
│   ├── Layouts/        # Layout templates
│   └── app.js          # Main Vue/Inertia entry point
├── css/
│   └── app.css         # Tailwind CSS

tests/
├── Feature/            # End-to-end HTTP tests
└── Unit/               # Logic isolation tests

database/
├── migrations/         # Database schema
├── factories/          # Model factories
└── seeders/            # Database seeders
```

---

## 🗄️ Database Schema

### Core Tables

**users**
- Standard Laravel authentication table
- Roles: `admin`, `recruiter`

**jobs**
- Job postings
- Fields: title, description, department, location, type, salary range, status, requirements, benefits

**candidates**
- Applicant profiles
- Fields: personal info, resume_path, skills (JSON), ai_analysis (JSON), culture_fit_score

**applications**
- Junction table linking candidates to jobs
- Fields: stage (kanban position), interview_notes (JSON), offered_salary, assigned_to
- Stages: applied → screening → phone_interview → technical_interview → hr_interview → offer → hired

---

## 🔐 Authentication & Authorization

### Default Users (After Seeding)

| Email | Password | Role |
|-------|----------|------|
| admin@snaprecruit.com | password | Admin |
| recruiter@snaprecruit.com | password | Recruiter |

### Permissions

- **Admin**: Full access (manage users, jobs, candidates, settings)
- **Recruiter**: Manage candidates and applications, view jobs

---

## 🤖 AI Integration

The AI Resume Analyst uses **OpenAI GPT-4** to extract structured data from uploaded resumes.

### Example AI Analysis Output

```json
{
  "years_of_experience": 5,
  "top_skills": ["Laravel", "Vue.js", "MySQL", "Docker"],
  "education": "Bachelor's in Computer Science",
  "culture_fit_score": 85.5,
  "summary": "Experienced full-stack developer with strong Laravel expertise..."
}
```

---

## 🚀 API Documentation

### Public Endpoints

#### Get All Published Jobs
```
GET /api/v1/jobs
```

**Query Parameters**:
- `department` (optional): Filter by department
- `location` (optional): Filter by location
- `type` (optional): full-time, part-time, contract, internship
- `page` (optional): Pagination page number

**Response**:
```json
{
  "data": [
    {
      "id": 1,
      "title": "Senior Laravel Developer",
      "description": "We are seeking...",
      "department": "Engineering",
      "location": "Remote",
      "type": "full-time",
      "salary_range": "$120k - $150k USD"
    }
  ],
  "links": {...},
  "meta": {...}
}
```

---

## 📝 Development Workflow

### Creating a New Feature

1. **Create a branch**
   ```bash
   git checkout -b feature/candidate-scoring
   ```

2. **Write tests first** (TDD approach)
   ```bash
   ./vendor/bin/sail artisan make:test CandidateScoringTest
   ```

3. **Implement the feature**
   - Create Service class in `app/Services/`
   - Create Controller method
   - Create Vue component in `resources/js/Pages/`

4. **Run tests**
   ```bash
   ./vendor/bin/sail artisan test
   ```

5. **Code formatting**
   ```bash
   ./vendor/bin/sail pint
   ```

---

## 🎯 Roadmap

- [ ] Email template builder
- [ ] Calendar integration for interview scheduling
- [ ] Advanced analytics dashboard
- [ ] Mobile app (React Native)
- [ ] Multi-tenant support
- [ ] Integration with LinkedIn API
- [ ] Video interview integration (Zoom/Meet)

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 👨‍💻 Author

**Created by Mandy Lam**
*Full Stack Engineer | UX/UI Designer*

- LinkedIn: https://www.linkedin.com/in/lamyiip/
- GitHub: https://github.com/lamyiip

---

## 🙏 Acknowledgments

- Built with [Laravel](https://laravel.com)
- UI components from [Headless UI](https://headlessui.com)
- Icons from [Heroicons](https://heroicons.com)
- Powered by [OpenAI](https://openai.com)

---

## 📧 Contact

For questions or feedback, please reach out via [your-email@example.com](mailto:your-email@example.com).
