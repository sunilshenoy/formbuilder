<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Form Builder

### Prerequisites

You will need to install Composer, PHP. Also have a way to configure virtual host and a web server running on the machine.

## Built With

* [Laravel](https://laravel.com/) - The web framework used
* [MySQL](https://www.mysql.com/) - Database.

### Installing

- Clone this repository.
- Create .env file in root folder based on .env.example
- Update database settings to point to existing database.
- run ```composer install```
- run ```php artisan key:generate```
- run ```php artisan migrate```
- Have virtual host point to /public directory of the folder.
- Visit http://{yourvirtualhostname}

## Features completed

1. Create dynamic form using json structure.
2. Dynamic form starts with a default JSON structure.
3. You can add edit, view, delete entries to these dynamic forms created.

## Structure

- Form Builder Controller handles creating the JSON structure for the form.
- Form Entries Controller handles creating the entries for the form.

## TODO

1. Update frontend to use React.js
2. Validation for dynamic form field entries.
2. Unit tests for functions.
4. File storage.

## Not sure

I was not sure what "menu" type is. Have not considered that as a form input type as part of the current solution.

## Thoughts

- I played around a bit with the UI to have form fields as UI input data. i.e Number of Text type:__1___. Number of TextArea ares: _____2_____ etc.

- Thought about creating UI similar to wufoo.com where fields can be dragged and dropped.(avoided this due to time constraint.) 

- Decided to use JSON structure as form definition as this felt like a simple solution to the problem at hand, although this solution is a bit technical.

- I have avoided using sub views as there were not a lot of views in the project as of now.

- I have avoided using React for now, because I would not be able to complete this task across frontend considering the time constraint.

- Enjoyed working on this task :)

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
