# 🤖 Telegram Fragment Bot - Stars & Premium Shop

- A powerful Telegram bot for managing a Fragment-based shop to sell Telegram Stars and Premium subscriptions automatically.

## ✨ Features

- ⭐ **Sell Telegram Stars** - Automated star delivery system
- 👑 **Sell Premium Subscriptions** - Premium account sales management
- 💰 **Wallet System** - Internal balance for users
- 📦 **Product Management** - Add/edit/remove products and categories
- 🛒 **Order System** - Automatic order processing and tracking
- 👨‍💼 **Admin Panel** - Full control over shop and users
- 📊 **Transaction History** - Complete order logs
- 🔔 **Notification System** - Real-time updates for users and admins

## 🛠️ Technologies

- **PHP 8.4+** - Backend logic
- **MySQL** - Database management
- **Telegram Bot API** - Bot functionality
- **PDO** - Secure database connections

## 📋 Requirements

- PHP 8.4 or higher
- MySQL
- Web server (Apache)
- SSL certificate (for webhook)
- Telegram Bot Token (from [@BotFather](https://t.me/BotFather))

## 🚀 Installation

### 1. Clone the repository
```bash
git clone https://github.com/devmramirOrg/fragment-bot.git
cd fragment-bot
```

### 2. Configure `config.php`

Edit the `config.php` file and fill in your details:

```php
<?php
// Telegram Bot Configuration
$token        = "YOUR_BOT_TOKEN"; // Bot token from @BotFather
$admin        = "544316811"; // Your Telegram numeric ID
$bot_id       = "irancreatbot"; // Bot username (without @)
$web          = "https://devmramir.sbs/irancreat"; // Your bot folder URL

// Optional: Force join channels (without @)
$chaneljoin   = "";
$chaneljoin2  = "";
$chaneljoin3  = "";
$chaneljoin4  = "";

// Database Configuration
$serverName   = "localhost";
$db_name      = "name";
$db_user      = "user";
$db_pass      = 'passwird';
?>
```
### 3. Open `table.php` on Browser
```text
https://YourDomain.com/YourFileName/table.php
```

### 4. SetWebhook on `index.php`
```text
https://api.telegram.org/botYOURTOKEN/setwebhook?url=https://yourdomain.com/yourfilename/index.php
```
- YOURTOKEN : Your Telegram ‌Bot Token
