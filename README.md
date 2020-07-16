To work it :

- composer install

- create an file name ".env.local" in this file "DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7" or your MariaDB version

- create a database with doctrine "php bin/console do:da:cr"

- make the migration with "php bin/console do:mi:mi"

- npm install or yarn install (use what you want)

- npm run dev or yarn run dev

- dont' forget to install encore-webpack and bootstrap 

- You can install PantherBundle too, to make some tests

- create some fixtures to customize it 

- i think it's done, in the end you just have to write this in your cmd "symfony server:server"

Enjoy the code ! Enjoy your day !
