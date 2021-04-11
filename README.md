# Laravel Model Observer
A Laravel Package to Log and analize all actions performed on a Eloquent Model.

![alt text](https://github.com/Kchinkesh/Laravel-Model-Observer/blob/main/detail_change.png?raw=true)

### Requirements
- Laravel 7+
- laravel/ui or laravel/breeze or jetstream for authentication purpose

### Installation Instructions
1. From Your Projects Root Terminal run
<pre>composer require kchinkesh/laravel-model-observer</pre>
2. Register the Package
- Laravel 5.5 and up Uses package auto discovery feature, no need to edit the config/app.php file.
3. Run the migration to add the table to record the activities to
<pre>php artisan migrate</pre>
- Note: If you want to specify a different table or connection make sure you update your .env file with the needed configuration variables.
4. Optionally publish the packages views, config file, assets, and language files by running the following from your projects root folder:
<pre>php artisan vendor:publish --tag=LaravelModelObserver</pre>
