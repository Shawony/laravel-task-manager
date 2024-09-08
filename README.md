# Laravel To-Do Application

This is a simple To-Do application built with Laravel, featuring user authentication, task management, and task prioritization. Users can register, log in, create, view, update, and delete their tasks. Each user has their own set of tasks that are managed in a secure and authenticated environment.

## Features

- User Registration and Login
- Task Creation, Editing, and Deletion
- Task Prioritization and Sorting
- User-Specific Task Management

## Prerequisites

- PHP 8.1 or higher
- Composer
- MySQL or any other supported database
- Node.js and NPM (for compiling front-end assets)
- Laravel 10.x

## Installation

Follow these steps to set up the application locally:

1. **Clone the Repository**

   ```bash
   
   git clone https://github.com/Shawony/laravel-task-manager
   cd laravel-todo-app

   composer install
   
   npm install
   npm run dev

   php artisan key:generate

   php artisan migrate

   php artisan serve

  ```


   ### The application will be available at http://localhost:8000.

