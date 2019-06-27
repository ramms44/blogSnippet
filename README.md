# Blog-System-in-Laravel

Features : 
- snippet posting in blog with admin panel
- manage blog/website with admin panel 
- manage tags, category, ads, posts, user/admin/author in admin dashboard
- etc

##Windows users:

Download xampp or wamp: http://www.wampserver.com/en/
Download and extract cmder mini: https://github.com/cmderdev/cmder/releases/download/v1.1.4.1/cmder_mini.zip
Update windows environment variable path to point to your php install folder (inside wamp installation dir) (here is how you can do this http://stackoverflow.com/questions/17727436/how-to-properly-set-php-environment-variable-to-run-commands-in-git-bash)
cmder will be refered as console

##Mac Os, Ubuntu and windows users continue here:

Create a database locally named homestead/etc what u want name it for db server, utf8_general_ci/etc
Download composer https://getcomposer.org/download/
Pull Laravel/php project from git provider.
Rename .env.example file to .envinside your project root and fill the database information. (windows wont let you do it, so you have to open your console cd your project root directory and run mv .env.example .env )
Open the console and cd your project root directory
Run composer install or php composer.phar install
Run php artisan key:generate
Run php artisan migrate
Run php artisan db:seed to run seeders, if any.
Run php artisan serve

#####You can now access your project at localhost:8000 :)

If for some reason your project stop working do these:
composer install
php artisan migrate
