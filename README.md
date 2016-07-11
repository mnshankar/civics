# civics
US Naturalization Test Flash Cards. Because.. ignorance is not cool :-)

This Laravel 5+ package provides an easy drop-in package to help you brush up on your (US) civic knowledge.

## Installation
Within your laravel 5 project, 
```
composer require "mnshankar/civics"
```
Next, add the service provider to your providers array in app/config/app.php:
```
mnshankar\civics\CivicsServiceProvider::class,
```

The application can then be accessed by appending "/civics" after your base url:
```
http://{your-app-base-url}/civics
```
## Optional
Publish your view file to change the look-and-feel of the displayed flashcards
```
php artisan vendor:publish --provider="mnshankar/civics/CivicsServiceProvider"
```
## Features
1. Randomized order of questions
2. Uses a self-contained sqlite database installed along with the package
3. Seed file for list of questions is provided. So, if/when answers to questions do change,
updating the system is as easy as updating the seed file and reseeding like so:
```
php artisan db:seed --class=mnshankar\civics\seeds\QuestionSeeder
```
