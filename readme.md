## Plates API

API desarrollada en Laravel, principalmente por la forma sencilla y potente para la gestión de rutas que posee, facilita 
de una manera gigantesca esta labor, intente realizar la API de la forma mas sencilla que pude, dividiendo los endpoints
en multiples controladores para manejar las operaciones de las relaciones y hacer esto de una forma mas entendible.


Iniciar instalando las dependencias con composer:

`composer install`


Crear fichero .env basado en .env.example y colocar la información de conexión de base de datos, el motor utilizado es MySql.
Ejecutar las migraciones con el siguiente comando:


`php artisan migrate --seed`


Endpoints disponibles hasta el momento

```
|        | GET|HEAD  | apiv1/allergens                                     | allergens.index               | App\Http\Controllers\Allergen\AllergenController@index               | api        |
|        | POST      | apiv1/allergens                                     | allergens.store               | App\Http\Controllers\Allergen\AllergenController@store               | api        |
|        | PUT|PATCH | apiv1/allergens/{allergen}                          | allergens.update              | App\Http\Controllers\Allergen\AllergenController@update              | api        |
|        | DELETE    | apiv1/allergens/{allergen}                          | allergens.destroy             | App\Http\Controllers\Allergen\AllergenController@destroy             | api        |
|        | GET|HEAD  | apiv1/allergens/{allergen}                          | allergens.show                | App\Http\Controllers\Allergen\AllergenController@show                | api        |
|        | GET|HEAD  | apiv1/allergens/{allergen}/ingredients              | allergens.ingredients.index   | App\Http\Controllers\Allergen\AllergenIngredientController@index     | api        |
|        | GET|HEAD  | apiv1/allergens/{allergen}/plates                   | allergens.plates.index        | App\Http\Controllers\Allergen\AllergenPlateController@index          | api        |
|        | POST      | apiv1/categories                                    | categories.store              | App\Http\Controllers\Category\CategoryController@store               | api        |
|        | GET|HEAD  | apiv1/categories                                    | categories.index              | App\Http\Controllers\Category\CategoryController@index               | api        |
|        | PUT|PATCH | apiv1/categories/{category}                         | categories.update             | App\Http\Controllers\Category\CategoryController@update              | api        |
|        | DELETE    | apiv1/categories/{category}                         | categories.destroy            | App\Http\Controllers\Category\CategoryController@destroy             | api        |
|        | GET|HEAD  | apiv1/categories/{category}                         | categories.show               | App\Http\Controllers\Category\CategoryController@show                | api        |
|        | GET|HEAD  | apiv1/categories/{category}/plates                  | categories.plates.index       | App\Http\Controllers\Category\CategoryPlateController@index          | api        |
|        | POST      | apiv1/ingredients                                   | ingredients.store             | App\Http\Controllers\Ingredient\IngredientController@store           | api        |
|        | GET|HEAD  | apiv1/ingredients                                   | ingredients.index             | App\Http\Controllers\Ingredient\IngredientController@index           | api        |
|        | PUT|PATCH | apiv1/ingredients/{ingredient}                      | ingredients.update            | App\Http\Controllers\Ingredient\IngredientController@update          | api        |
|        | DELETE    | apiv1/ingredients/{ingredient}                      | ingredients.destroy           | App\Http\Controllers\Ingredient\IngredientController@destroy         | api        |
|        | GET|HEAD  | apiv1/ingredients/{ingredient}                      | ingredients.show              | App\Http\Controllers\Ingredient\IngredientController@show            | api        |
|        | GET|HEAD  | apiv1/ingredients/{ingredient}/allergens            | ingredients.allergens.index   | App\Http\Controllers\Ingredient\IngredientAllergenController@index   | api        |
|        | PUT|PATCH | apiv1/ingredients/{ingredient}/allergens/{allergen} | ingredients.allergens.update  | App\Http\Controllers\Ingredient\IngredientAllergenController@update  | api        |
|        | DELETE    | apiv1/ingredients/{ingredient}/allergens/{allergen} | ingredients.allergens.destroy | App\Http\Controllers\Ingredient\IngredientAllergenController@destroy | api        |
|        | POST      | apiv1/plates                                        | plates.store                  | App\Http\Controllers\Plate\PlateController@store                     | api        |
|        | GET|HEAD  | apiv1/plates                                        | plates.index                  | App\Http\Controllers\Plate\PlateController@index                     | api        |
|        | GET|HEAD  | apiv1/plates/{plate}                                | plates.show                   | App\Http\Controllers\Plate\PlateController@show                      | api        |
|        | PUT|PATCH | apiv1/plates/{plate}                                | plates.update                 | App\Http\Controllers\Plate\PlateController@update                    | api        |
|        | DELETE    | apiv1/plates/{plate}                                | plates.destroy                | App\Http\Controllers\Plate\PlateController@destroy                   | api        |
|        | GET|HEAD  | apiv1/plates/{plate}/allergens                      | plates.allergens.index        | App\Http\Controllers\Plate\PlateAllergenController@index             | api        |
|        | GET|HEAD  | apiv1/plates/{plate}/ingredients                    | plates.ingredients.index      | App\Http\Controllers\Plate\PlateIngredientController@index           | api        |
|        | PUT|PATCH | apiv1/plates/{plate}/ingredients/{ingredient}       | plates.ingredients.update     | App\Http\Controllers\Plate\PlateIngredientController@update          | api        |
|        | DELETE    | apiv1/plates/{plate}/ingredients/{ingredient}       | plates.ingredients.destroy    | App\Http\Controllers\Plate\PlateIngredientController@destroy         | api        |
|        | GET|HEAD  | apiv1/users                                         | users.index                   | App\Http\Controllers\User\UserController@index                       | api        |
|        | POST      | apiv1/users                                         | users.store                   | App\Http\Controllers\User\UserController@store                       | api        |
|        | GET|HEAD  | apiv1/users/{user}                                  | users.show                    | App\Http\Controllers\User\UserController@show                        | api        |
|        | PUT|PATCH | apiv1/users/{user}                                  | users.update                  | App\Http\Controllers\User\UserController@update                      | api        |
|        | DELETE    | apiv1/users/{user}                                  | users.destroy                 | App\Http\Controllers\User\UserController@destroy                     | api      
```
## Log

Se Encuentra implmentado un Log de actividades para el modelo Plates.
 
## Pruebas Unitarias

Se encuentran activas las pruebas unitarias para los metedos index, store, show, update y delete de los siguiente controladores:

- Allergen
- Category
- Ingredient
- Plate

Las pruebas se deben realizar en database test.sqlite

```
touch database/test.sqlite
php artisan migrate --seed --env=testing
```

## To Do

- HATETOAS
- CORS
- Transformaciones y Mutadores
- Paginación
- Ordenacion
- Php Unit pruebas operaciones complejas
- Capaz de seguridad
- User Auth
- Modelo Activity Log