# TelegramBotPHP
![CURL](https://img.shields.io/badge/cURL-required-green.svg)
[![License](https://poser.pugx.org/eleirbag89/telegrambotphp/license)](#)

A very simple Telegram Bot PHP for check info covid19

Scrape From
---------
- Maluku Utara:  [https://covid19.ternatekota.go.id/]
- Sulawesi Selatan: [https://covid19.sulselprov.go.id/]

Requirements
---------

* PHP >= 7
* Curl extension.
* Telegram API key, you can get one simply with [@BotFather](https://core.telegram.org/bots#botfather) with simple commands right after creating your bot.

Installation
---------

From a project directory, run:
```
https://github.com/bungnewbie/scrape-covid-malut
```

```
cd scrape-covid-malut
```

```
composer install
```

```php
$bot = new GetUpdate("PASTE YOUR TOKEN HERE");
```

Configuration (WebHook)
---------

Navigate to
https://api.telegram.org/bot(BOT_TOKEN)/setWebhook?url=https://yoursite.com/update.php
Or use the Telegram class setWebhook method.

Example Result
------------
![alt text](https://i.imgur.com/D0bXqIP.png)

License
------------

This open-source software is distributed under the MIT License. See LICENSE.md

Contributing
------------

All kinds of contributions are welcome - code, tests, documentation, bug reports, new features, etc...

* Send feedbacks.
* Submit bug reports.
* Write/Edit the documents.
* Fix bugs or add new features.

Contact me
------------

You can contact me [via Telegram](t.me/bungnewbie) but if you have an issue please [open](https://github.com/bungnewbie/scrape-covid-malut/issues) one.