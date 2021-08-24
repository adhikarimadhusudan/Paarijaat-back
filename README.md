# Paarijaat-back
Well, Let's setup first,
Firstly, 
Create a new database with desired name, eg, paarijat
open terminal within this root directory and hit the following commands,
```
    cp .env.example .env
```
Now open that .env file and change the following,
```
    DB_DATABASE=<database_name>
    DB_USERNAME=<database username>
    DB_PASSWORD=<database password>

    DEFAULT_USERNAME=<YOUR USERNAME FOR LOGGING IN>
    DEFAULT_PASS=<YOUR PASSWORD FOR LOGGING IN>
    DEFAULT_FIRSTNAME=<YOUR FIRSTNAME>
    DEFAULT_LASTNAME=<YOUR LASTNAME>
    DEFAULT_PROFILE=<YOUR PROFILE IMAGE LINK, YOU CAN USE YOUR OFFICIAL LOGO URL>
```


```
    composer install
    php artisan key:generate
    php artisan jwt:secret
    php artisan migrate --seed
```

And That's it, 
It will automatically creates a user with the details you provided, from that .env file,
Remember, Only set the password to .env file, 