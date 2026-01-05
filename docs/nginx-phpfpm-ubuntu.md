# Nginx + PHP-FPM on Ubuntu (Notes)

## Packages
```bash
sudo apt update
sudo apt install nginx php8.2-fpm php8.2-mysql php8.2-xml php8.2-curl php8.2-mbstring php8.2-zip php8.2-redis
```

## Nginx server block (example)
```nginx
server {
  listen 80;
  server_name example.com;

  root /var/www/bcms/backend/public;
  index index.php;

  location / {
    try_files $uri $uri/ /index.php?$query_string;
  }

  location ~ \.php$ {
    include snippets/fastcgi-php.conf;
    fastcgi_pass unix:/run/php/php8.2-fpm.sock;
  }

  location ~ /\.ht {
    deny all;
  }
}
```

## Queue worker
Use Supervisor:
```ini
[program:bcms-queue]
command=php /var/www/bcms/backend/artisan queue:work --sleep=1 --tries=3
user=www-data
autostart=true
autorestart=true
stderr_logfile=/var/log/bcms-queue.err.log
stdout_logfile=/var/log/bcms-queue.out.log
```