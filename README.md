## Email Verification Tool

#### Setup

- Laravel valet
    - If you do not have Laravel Valet installed, follow the instructions [here](https://laravel.com/docs/6.x/valet#installation) 
        ##### TL/DR
        - `brew update`
        - `brew install php`
        - Install composer [here](https://getcomposer.org/)
        - `composer global require laravel/valet`. Make sure the ~/.composer/vendor/bin directory is in your system's "PATH".
        - `valet install`
    - Directions to serve the site (https://laravel.com/docs/6.x/valet#serving-sites): 
        ##### TL/DR
        - In your terminal, make a new directory for the project: 
            - `mkdir ~/Code`
            - `cd ~/Code`
            - run `valet park`
    - Fork or clone project here into `~/Code` directory: [email verification tool](https://github.com/tthompson899/Email-Verification-Tool.git)
    - Once project is cloned, spin up the website at [emailverificationtool.test](http://emailverificationtool.test/)

- MySQL
    - `brew install mysql@5.7`
    - `brew services start mysql@5.7`

    - Once valet and project has been cloned locally, run `composer install`
    - Database setup info is located in .env file, below is my setup
        *DB_CONNECTION=mysql
           DB_HOST=127.0.0.1
           DB_PORT=3306
           DB_DATABASE=email_verification
           DB_USERNAME=root
           DB_PASSWORD=password*
        

#### Project Approach
- Create Appropriate API Endpoints
    - verify - To verify the email address is not already in the database
        - If already in db, return error message
    - create - Once verified, email address should be added to db
        - once created, return success message
    - admin/list all - Admin endpoint that lists all email addresses in db

    - The logic behind the endpoints was to have a create method and within the create method you can verify the email which you have access to it. This can also be helpful if you want to create additional fields later on as I have created additional fields (first_name, last_name). It will be easy to get all request data and still be able to verify emails through the same process.

- Database schema
    *users:*
    id
    first_name
    last_name
    email
    created_at
    updated_at

    *product_campaign_users table:*
    user_id
    created_at
    updated_at

    - The users table lists all users. The idea behind the product_campaign_users table is that only users that were added to the new campaign will be on this table; it also leaves room to build on if there are multiple product campaigns, you can then add multiple products and users to this table. Ex. You have Product A and Product B, there's potential to add a column product_a and product_b which can both be boolean to determine if the user was signed on with which campaign. 

- Create Test Data Tool
    - command that populates the database with test data
        - should be accessed by admin

    - Seed User table with data
        - `php artisan db:seed`

- Provide tests
    - test for verify email
    - test for creating email

    - If you installed via Laravel Valet, in order to run tests, you may have to use `vendor/bin/phpunit tests/Feature/UserTest.php`

- Safety concerns
    - validate email

    - I only allowing the request values specified (first_name, last_name, email) in an effort to prevent unwanted data coming in the form. I'm also throttling requests to five per hour to prevent several requests per minute.