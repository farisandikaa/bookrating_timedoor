# 📚 Book Rating App — Timedoor Backend Programming Exam

![Laravel](https://img.shields.io/badge/Laravel-10-FF2D20?style=flat&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat&logo=php)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.3.3-06B6D4?style=flat&logo=tailwind-css)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat&logo=mysql)
![Vite](https://img.shields.io/badge/Vite-Bundler-646CFF?style=flat&logo=vite)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?style=flat&logo=javascript)

A modern and responsive **Book Rating Application** built with **Laravel 10**, **Tailwind CSS**, and **MySQL**, designed for managing books, authors, and user ratings.  
Includes features like **dark mode toggle**, **search & pagination**, and **interactive UI** with Vite-powered frontend.

---

## ✨ Features

- List and manage books with average ratings  
- View top authors based on voter count  
- Insert new ratings dynamically  
- Built-in dark mode toggle  
- Search and pagination with customizable per-page options  
- Responsive layout with Tailwind CSS 3.3  
- Modern layout using Laravel Blade + Vite  

---

## 📂 Project Structure
```
BookRatingApp/
├── app/
│ ├── Http/
│ ├── Models/
│ └── Providers/
├── database/
│ ├── migrations/
│ └── seeders/
├── public/
│ └── build/
├── resources/
│ ├── css/
│ │ └── app.css
│ ├── js/
│ │ ├── app.js
│ │ └── darkmode.js
│ └── views/
│ ├── layouts/
│ │ └── app.blade.php
│ ├── books/
│ │ ├── index.blade.php
│ │ └── create.blade.php
│ └── authors/
│ └── top.blade.php
├── routes/
│ ├── web.php
│ └── api.php
├── tailwind.config.js
├── postcss.config.js
├── package.json
├── vite.config.js
└── README.md
```

---

## 🛠️ Getting Started

### 1. Clone this repository
```
git clone https://github.com/farisandikaa/bookrating_timedoor.git
cd bookrating_timedoor
```

### 2. Install dependencies
```
composer install
npm install
```

### 3. Setup environment
```
cp .env.example .env
php artisan key:generate

Then change the database configuration in .env according to your MySQL:
DB_DATABASE=timedoor_db
DB_USERNAME=root
DB_PASSWORD=
```


### 4. Database Setup
```
To use this project properly, you’ll need to import the provided MySQL database.

1. Create the Database
Open your MySQL client or phpMyAdmin, then create a new database named `timedoor_db`

2. Import the SQL
Import the sql located in bookrating_timedoor/timedoor_db.sql

Or if you want to fill faked data by yourself without import timedoor_db.sql, you can run this command : 

php artisan db:seed

Open your MySQL client or phpMyAdmin, click SQL and run this command :

UPDATE books
SET name = REGEXP_REPLACE(name, '[#0-9]+$', '');

UPDATE authors
SET name = REGEXP_REPLACE(name, '[#0-9]+$', '');


```

### 5. Build frontend assets
```
npm run dev
```

### 6. Start local server
```
php artisan serve
```
---

## API Documentation

### **GET /books**
```
Get the list of books with their authors, average rating, and voter count.

[
  {
    "id": 1,
    "book_name": "Officiis eum at",
    "author": "Prof. Eldridge Mayer MD",
    "avg_rating": 10.00,
    "voter_count": 1
  }
]
```

### **GET /top**
```
Get the top 10 most famous authors sorted by total voter count.

[
  {
    "id": 1,
    "author_name": "Timmy Boehm",
    "voter_count": 3
  }
]

```

### **POST /create-rating**
```
Create a new rating for a specific book.
Request
{
  "author_id": 1,
  "book_id": 2,
  "rating": 9
}

Response
{
  "message": "Rating added successfully"
}

```

---

## 🧠 Notes
- Tailwind CSS is set up through Vite for fast builds.
- All custom JavaScript (including the dark mode toggle) is placed in resources/js.
- Make sure to run npm run dev every time you update your styles.

---

## 📜 License
This project is licensed under the [MIT License](LICENSE).

---

## 📬 Contact
If you’d like to collaborate or have any inquiries, feel free to reach out:

- 📧 Email: **farisandika2111@gmail.com**
- 💼 LinkedIn: [linkedin.com/in/farisandikaputra](https://linkedin.com/in/farisandikaputra)
- 🐙 GitHub: [github.com/farisandikaa](https://github.com/farisandikaa)
