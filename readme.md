# Sample Recipe Manager 

This application is a demo RESTful API allowing CRUD operations to be performed upon a table holding recipe information, and to save user ratings against a recipe record, making JSON responses to all requests. It is written for the Lumen framework (version 5.4x). Lumen was chosen as it is the preferred framework for microservices architecture.  [Lumen website here](http://lumen.laravel.com/docs) 
 
## Installation Requirements
    
You will need a web server environment running PHP 7.0, Apache or Nginx, including the sqlite extensions for PHP. There is no need to setup a database connection as the data is included in the file ./database/database.sqlite.  
 
## Setup Guide
 
 1  Clone this repository to an appropriate location on your webserver environment. 
 
 2  Navigate to the root of your project and run: composer update
 
 3  Run command: chmod -R 775 storage/
 
 4  Rename the file env.example to .env
 
 You should now be able to interact with the API via the following endpoints:
  
## Usage  
  
### Get Recipe List By ID
 
  Method: GET
  
  Path: /api/v1/recipe/{id} 
### Get Recipe List By Cuisine Type
 
  Method: GET
  
  Path: /api/v1/recipe_list/{cuisine_type}/{results_per_page}
    
### Delete Recipe List By ID
 
  Method: DELETE
  
  Path: /api/v1/recipe/{id}        
 
### Save Recipe 

  Method: POST
  
  Path: /api/v1/recipe
  
  Body:
   
    box_type: {string}
    title:{string}
    short_title:{string}
    marketing_description:{medium text} (min 100 characters)
    calories_kcal:{integer}
    protein_grams:{integer}
    fat_grams:{integer}
    carbs_grams:{integer}
    bulletpoint1:{string}
    bulletpoint2:{string}
    bulletpoint3:{string}
    recipe_diet_type_id:{string}
    season:{string}
    base:{string}
    protein_source:{string}
    preparation_time_minutes:{integer}
    shelf_life_days:{integer}
    equipment_needed:{string}
    origin_country:{string}
    recipe_cuisine:{string}
    gousto_reference:{integer}
 
### Update Recipe 

  Method: PUT
  
  Path: /api/v1/recipe/{id}
  
  Body:
   
    box_type: {string}
    title:{string}
    short_title:{string}
    marketing_description:{medium text} (min 100 characters)
    calories_kcal:{integer}
    protein_grams:{integer}
    fat_grams:{integer}
    carbs_grams:{integer}
    bulletpoint1:{string}
    bulletpoint2:{string}
    bulletpoint3:{string}
    recipe_diet_type_id:{string}
    season:{string}
    base:{string}
    protein_source:{string}
    preparation_time_minutes:{integer}
    shelf_life_days:{integer}
    equipment_needed:{string}
    origin_country:{string}
    recipe_cuisine:{string}
    gousto_reference:{integer}    
    
### Save Rating
    
  Method: POST
  
  Path: /api/v1/rating
  
  Body:
   
      rating:{integer} 
      users_id:{integer} 
      recipes_id:{integer} 
      
    
## Notes            

Requests are secured by the requirement for a header token: ApiToken : {token} 
This is how the user identity is resolved for the rating endpoint.  

For the sake of convenience, if you use Postman, all endpoints are testable by importing the file Recipe Manager.postman_collection.json in the root of the project: this includes a working ApiToken value in the header of each request.
 
There is also a small number of unit tests - each endpoint is also testable by running: phpunit --debug
 
The database folder also contains full migrations and seed files. This means that a mysql database can be built and populated easily using this command:
php artisan migrate:refresh --seed  (This would require making the relevant changes to the database settings in .env)
   
   