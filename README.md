# MusicMeetups
This is a project for the web technologies course @FMI (https://www.fmi.uni-sofia.bg/)

The idea is to implement a simple PHP web application that helps people organising live music performances in casual atmosphere. The key features are: hosting music event, subscribe to perform at a music event and book a slot to attend a music event. We were inspired by the already functional webapp - https://www.groupmuse.com/ which does pretty much the same but focusses on classical music only

Run instructions:
1. Install XAMPP and run it
2. Clone the repo
3. Create your mysql account
4. In application/config/config.php change the settings of the mysql connection
```php
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'musicmeetup');
define('DB_USER', 'root');
define('DB_PASS', 'your_password');
```
6. Execute the SQL scripts from _installation

# External libs
1. Bootstrap 4
2. jQuery3
3. Awesome fonts
4. Google maps API
