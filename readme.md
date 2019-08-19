# Ecommerce Restful API

1. Start a new git repository & @terminal ```git init```
1. To get help in creating model, @terminal ```php artisan help make:model```
1. Create model for Product, @terminal ```php artisan make:model FolderName/ModelName -a``` here we will be using FolderName = Model & ModelName = Product.
1. Create model for Review, @terminal ```php artisan make:model Model/Review -a```
1. Create API route @routes/api.php, follow inst [1]
1. To see the route list @terminal ```php artisan route:list```
1. Let's see our git status @terminal ```git status```
1. Lets add the all changes to git @termnial ```git add .```
1. Commit the changes in git, @terminal ```git commit -m "Created Models & Routes -a```
1. Push it to remote git repository, @terminal ```git push```
1. Create the Product table @database/migrations/..._products_table, follow inst [2]
1. Create the Review table @database/migrations/..._reviews_table, follow inst [3]
1. Lets migrate the tables @terminal ```php artisan migrate```
1. Let's see our git status @terminal ```git status```
1. Lets add the all changes to git @termnial ```git add .```
1. Commit the changes in git, @terminal ```git commit -m "Migration created for Products & Reviews```
1. Push it to remote git repository, @terminal ```git push```
1. Create the Products Factory faker @database/factories/ProductFactory.php, follow inst [4]
1. Create the Reviews Factory faker @database/factories/ReviewFactory.php, follow inst [5]
1. Create the Products & Reviews seeds @database/seeds/DatabaseSeeder.php, follow inst [6]
1. Now @terminal ```php artisan db:seed```
1. Lets add the all changes to git @termnial ```git add .```
1. Commit the changes in git, @terminal ```git commit -m "Products & Reviews table are seeded```
1. Push it to remote git repository, @terminal ```git push```
1. Create Product Review Relationship, @app/Model/Product.php, follow inst [7]
1. Create Review Product Relationship, @app/Model/Review.php, follow inst [8]
1. Use tinker to evaluate the relationship, @terminal ```php artisan tinker```
    1. Now let us get Product with id 3, @terminal with tinker ```App\Model\Product::find(3)```
    1. Now let us get Product Reviews with id 3, @terminal with tinker ```App\Model\Product::find(3)->reviews```
    1. Now let us get 3rd Review's Product detail, @terminal with tinker ```App\Model\Review::find(3)->product```
1. Lets add the all changes to git @termnial ```git add .```
1. Commit the changes in git, @terminal ```git commit -m "Products & Reviews Relationship Created```
1. Push it to remote git repository, @terminal ```git push```
1. Create Product Collection Resource, @terminal ```php artisan make:resource Product/ProductCollection```
1. Return all Product from index, @app/Http/Controllers/ProductController.php, follow inst [9] & initial Product api setup is ready.
1. Transform the Product api to the standards & according to the service requirement, @terminal
    1. ```php artisan make:model Model/Project```
    1. ```php artisan make:resource Product/ProductResource``` 
    1. @app/Http/Resources/Product/ProductResource, follow inst [10]
    1. @app/Http/Controllers/ProductController.php, follow inst [11]
1. Lets add the all changes to git @termnial ```git add .```
1. Commit the changes in git, @terminal ```git commit -m "Products resource Api Transformed```
1. Push it to remote git repository, @terminal ```git push```
1. Create Reviews Resource, @terminal ```php artisan make:resource ReviewResource```
1. Return all Reviews from index, @app/Http/Controllers/ReviewController.php, follow inst [12] & initial Review api setup is ready.
1. Transform the Review api to the standards & according to the service requirement, @app/Http/Resources/ReviewResources.php, follow inst [13]
1. Lets add the all changes to git @termnial ```git add .```
1. Commit the changes in git, @terminal ```git commit -m "Review resource Api Transformed```
1. Push it to remote git repository, @terminal ```git push```
1. Now we will work with Passport for authentication, @terminal 
    1. ```composer require laravel/passport```
    1. ```php artisan migrate```
    1. ```php artisan passport:install```
    1. @app/User.php, follow inst [14]
    1. @app/Providers/AuthServiceProvider.php, follow inst [15]
    1. @config/auth.php, follow inst [16]
    1. @terminal ```php artisan make:auth```
    1. Now test the OAuth feature using PostMan App.
1. Lets add the all changes to git @termnial ```git add .```
1. Commit the changes in git, @terminal ```git commit -m "Passport Installed & verified"```
1. Push it to remote git repository, @terminal ```git push```
1. Now will work on Product CRUD operation with Auth, 
    1. @app/Http/Controllers/ProductControllers.php, follow inst [17]
    1. @terminal ```php artisan make:request ProductRequest```
    1. @app/Http/Requests/ProductRequest.php, follow inst [18]
    1. @app/Http/Controllers/ProductControllers.php, follow inst [18]
    1. @app/Model/Product.php, follow inst [19]
1. Lets add the all changes to git @termnial ```git add .```
1. Commit the changes in git, @terminal ```git commit -m "Product OAuth CRUD created"```
1. Push it to remote git repository, @terminal ```git push```
1. Lets Handle the API Exceptions:
    1. @app/Exceptions create new file app/Exceptions/ExceptionTrait.php & follow inst [20]
    1. @app/Exceptions create new file app/Exceptions/Handler.php & follow inst [21]
1. Lets add the all changes to git @termnial ```git add .```
1. Commit the changes in git, @terminal ```git commit -m "Api Exception Handled with Custom exceptions"```
1. Push it to remote git repository, @terminal ```git push```
1. Lets Authorise users to update Products 
    1. @database/migrations/..._products_table, follow inst [22]
    1. Clear db, @terminal ```php artisan migrate:refresh```
    1. update User factory, @database/factories/UserFactory.php follow inst [23]
    1. update Product factory, @database/factories/ProductFactory.php follow inst [24]
    1. update seeder, @database/seeds/DatabaseSeeder.php follow inst [25]
    1. Now @terminal php artisan db:seed
    1. Verify the backend db.
    1. @terminal php artisan make:exception ProductNotOfUser
    1. @app/Exceptions/ProductNotOfUser.php follow inst [26]
    1. Now @app/Http/Controllers/ProductController.php follow inst [27]
    1. Now for OAuth, @terminal ```php artisan passport:install```
1. Lets add the all changes to git @termnial ```git add .```
1. Commit the changes in git, @terminal ```git commit -m "User Product Review Cascade & Exception Handled"```
1. Push it to remote git repository, @terminal ```git push```
    