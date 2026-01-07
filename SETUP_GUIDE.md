# SnapRecruit - Quick Setup Guide

> **For complete beginners**: This is a simplified setup guide. For detailed documentation, see [README.md](README.md).

## What You Need

1. **Docker Desktop** - Download and install from [docker.com](https://www.docker.com/products/docker-desktop/)
2. **Git** - Download from [git-scm.com](https://git-scm.com/downloads)

That's it! You don't need PHP, MySQL, or anything else.

---

## Setup in 5 Minutes

Open your terminal (Command Prompt, PowerShell, or Terminal) and follow these steps:

### Step 1: Download the Project

```bash
git clone https://github.com/yourusername/snaprecruit.git
cd snaprecruit
```

### Step 2: Create Environment File

**Mac/Linux:**
```bash
cp .env.example .env
```

**Windows Command Prompt:**
```bash
copy .env.example .env
```

**Windows PowerShell:**
```bash
Copy-Item .env.example .env
```

### Step 3: Install Dependencies

**Mac/Linux:**
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install
```

**Windows PowerShell:**
```bash
docker run --rm -v ${PWD}:/var/www/html -w /var/www/html laravelsail/php82-composer:latest composer install
```

**Windows Command Prompt:**
```bash
docker run --rm -v %cd%:/var/www/html -w /var/www/html laravelsail/php82-composer:latest composer install
```

⏱️ *This will take 2-3 minutes...*

### Step 4: Start Docker

```bash
./vendor/bin/sail up -d
```

⏱️ *First time will take 5-10 minutes to download images...*

### Step 5: Setup Database

```bash
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
```

### Step 6: Install Frontend

```bash
./vendor/bin/sail npm install
```

### Step 7: Start Development Server

**Open a NEW terminal window** and run:

```bash
./vendor/bin/sail npm run dev
```

Keep this terminal running!

### Step 8: Open in Browser

Visit: **http://localhost**

🎉 You should see the SnapRecruit welcome screen!

---

## Stop Working

When you're done for the day:

```bash
./vendor/bin/sail down
```

## Start Working Again

Next time you want to work on the project:

**Terminal 1:**
```bash
cd snaprecruit
./vendor/bin/sail up
```

**Terminal 2 (new window):**
```bash
./vendor/bin/sail npm run dev
```

Then visit: http://localhost

---

## Need Help?

### Common Issues

**"sail command not found"**
- Make sure you're in the `snaprecruit` folder
- Use the full path: `./vendor/bin/sail`

**"Port 80 is already in use"**
- Something else is using port 80 (maybe Apache or IIS)
- Edit `compose.yaml` and change `"80:80"` to `"8000:80"`
- Then use http://localhost:8000

**"Cannot connect to database"**
- Wait 30 seconds after running `sail up` for MySQL to start
- Check containers are running: `./vendor/bin/sail ps`

**"Blank screen in browser"**
- Make sure you ran `npm run dev` in a separate terminal
- Check the terminal for error messages

---

## What's Next?

Your application is now running! Here's what you can do:

1. **Read the full README.md** - Learn about all features
2. **Explore the code** - Check out `app/`, `resources/js/Pages/`
3. **Make changes** - Edit `resources/js/Pages/Welcome.vue` and see live updates!
4. **Learn Laravel** - Visit [laravel.com/docs](https://laravel.com/docs)
5. **Learn Vue.js** - Visit [vuejs.org/guide](https://vuejs.org/guide/)

---

## Quick Commands

```bash
# See what's running
./vendor/bin/sail ps

# View logs
./vendor/bin/sail logs

# Access database
./vendor/bin/sail mysql

# Run migrations
./vendor/bin/sail artisan migrate

# Create a new controller
./vendor/bin/sail artisan make:controller NameController

# Run tests
./vendor/bin/sail artisan test

# Stop everything
./vendor/bin/sail down
```

---

**Questions?** Check the full [README.md](README.md) or create an issue on GitHub.

**Happy Coding!** 🚀
