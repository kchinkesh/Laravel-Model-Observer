# Laravel Eloquent Model Logger
A Laravel Package to Log and analize all actions performed on a Eloquent Model.

![Laravel Model Logger](https://github.com/Kchinkesh/Eloquent-Model-Logger/blob/main/logger.png?raw=true)

### Requirements
- Laravel 7+
- laravel/ui or laravel/breeze or jetstream for authentication purpose

### Installation Instructions
1. From Your Project's root Terminal run:
   <pre>composer require kchinkesh/eloquent-model-logger</pre>
2. Register the Package
   - Laravel 5.5 and up Uses package auto discovery feature, no need to edit the config/app.php file.
3. Run the migration to add the table to record the activities to:
   <pre>php artisan migrate</pre>
   Note: If you want to specify a different table or connection make sure you update your .env file with the needed configuration variables.
4. Optionally publish the packages views, config file, assets, and language files by running the following from your projects root folder:
   <pre>php artisan vendor:publish --tag=LaravelModelObserver</pre>
### Usage
   #### Trait Usage
   Events can be recorded directly by using the trait inside your Model. To use the Trait:
1. Include the call in the head of your model class file:
   <pre>use kchinkesh\LaravelModelObserver\App\Traits\ModelsObserver;</pre>
2. Include the trait call in the opening of your model class:
   <pre>use ModelsObserver;</pre>
### Routes
   Model Activity Dashboard Routes
   - /actions
   - /actions/view/{id}
## Screenshots
##### New Post
![New Post](https://github.com/kchinkesh/Eloquent-Model-Logger/blob/main/create.png)
##### Posts 
![Posts](https://github.com/kchinkesh/Eloquent-Model-Logger/blob/main/posts.png)
##### Edit Post
![Edit Post](https://github.com/kchinkesh/Eloquent-Model-Logger/blob/main/edit.png)
##### Model Logs
![Logs](https://github.com/kchinkesh/Eloquent-Model-Logger/blob/main/logs.png)
##### New Post Created Log
![New](https://github.com/kchinkesh/Eloquent-Model-Logger/blob/main/deatil_create.png)
##### Post attributes change log
![Change](https://github.com/kchinkesh/Eloquent-Model-Logger/blob/main/detail_change.png)
