@servers (['production' => 'deploybot@139.162.131.215'])

@task('deploy', ['on' => 'production'])
cd /home/deploybot/app/imt/
php artisan down
git reset --hard HEAD
git pull origin master
composer install
php artisan migrate --force
php artisan up
@endtask

@task('deploybeta', ['on' => 'production'])
cd /home/deploybot/app/beta/
php artisan down
git reset --hard HEAD
git pull origin master
composer install
php artisan migrate --force
php artisan up
@endtask