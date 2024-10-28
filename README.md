# Task Manager API

A simple task management API built with Lumen.

## Table of Contents

- [Installation](#installation)
- [API Endpoints](#api-endpoints)
- [Usage](#usage)
)

## Installation

1. Clone the repository:

```bash
   git clone https://github.com/yourusername/task-manager.git
   cd task-manager
   ```

2. Install Dependencies:

```bash
composer install
```
3. Create a .env:

```bash
cp .env.example .env
```
4. Update your database credentials in .env.


5. Run migrations

```bash
php artisan migrate
```

5. Start Server

```bash
php -S localhost:8000 -t public
```

## API Endpoints

#### 1. POST /api/tasks - Create a new task
#### 2. GET /api/tasks - Get a list of tasks
#### 3. GET /api/tasks/{id} - Get a specific task
#### 4. PUT /api/tasks/{id} - Update a specific task
#### 5. DELETE /api/tasks/{id} - Delete a specific task
#### 6. GET /api/search - Search for tasks by title

## Usage

#### Use Postman or similar tools to test the API. Make sure to set the Content-Type to application/json when sending requests.

### Example Request

To create a task:

```json
{
  "title": "Work Out",
  "description": "50 Pushups",
  "due_date": "2024-11-01"
}
```
