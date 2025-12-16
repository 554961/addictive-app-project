## Database Overview

* **Database Name:** `christmas_casino`
* **Purpose:**
  * Store user accounts and milk balances
  * Gambling games data
  * Record bets and outcomes
  * Track milk transactions (bets, wins, etc)

---

## Queries

## Users Table
Stores registered users and their current milk balance.

### Table: `users`

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    milk_balance INT DEFAULT 1000,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Fields

| Field         | Type      | Description           |
| ------------- | --------- | --------------------- |
| id            | INT       | Unique user ID        |
| username      | VARCHAR   | User login name       |
| email         | VARCHAR   | User email address    |
| password_hash | VARCHAR   | Hashed password       |
| milk_balance  | INT       | User's milk balance   |
| created_at    | TIMESTAMP | Account creation time |

---

## Games Table
Stores all gambling games.

### Table: `games`

```sql
CREATE TABLE games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    game_name VARCHAR(50) NOT NULL,
    description TEXT,
    min_bet INT DEFAULT 10,
    max_bet INT DEFAULT 500,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Fields

| Field       | Type      | Description        |
| ----------- | --------- | ------------------ |
| id          | INT       | Game ID            |
| game_name   | VARCHAR   | Name of the game   |
| description | TEXT      | Game description   |
| min_bet     | INT       | Minimum milk bet   |
| max_bet     | INT       | Maximum milk bet   |
| created_at  | TIMESTAMP | Game creation date |

---

## Bets Table
Records every bet placed by customers.

### Table: `bets`

```sql
CREATE TABLE bets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    game_id INT NOT NULL,
    bet_amount INT NOT NULL,
    win_amount INT DEFAULT 0,
    result ENUM('win', 'lose') NOT NULL,
    placed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (game_id) REFERENCES games(id)
);
```

### Fields

| Field      | Type      | Description             |
| ---------- | --------- | ----------------------- |
| id         | INT       | Bet ID                  |
| user_id    | INT       | User who placed the bet |
| game_id    | INT       | Game played             |
| bet_amount | INT       | Amount of milk wagered  |
| win_amount | INT       | Milk won (0 if lost)    |
| result     | ENUM      | win or lose             |
| placed_at  | TIMESTAMP | Time bet was placed     |

---

## Transactions Table
Tracks all changes to a user's milk balance.

### Table: `transactions`

```sql
CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    amount INT NOT NULL,
    type ENUM('bet', 'win', 'bonus') NOT NULL,
    description VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES users(id)
);
```

### Fields

| Field       | Type      | Description          |
| ----------- | --------- | -------------------- |
| id          | INT       | Transaction ID       |
| user_id     | INT       | User affected        |
| amount      | INT       | Milk amount (+ or -) |
| type        | ENUM      | bet, win, or bonus   |
| description | VARCHAR   | Explanation          |
| created_at  | TIMESTAMP | Timestamp            |

---

## Table Relationships

* `users.id` → `bets.user_id`
* `games.id` → `bets.game_id`
* `users.id` → `transactions.user_id`

Each user:

* Can place **many bets**
* Can have **many transactions**
* Has **one milk balance**