## Email Verification Tool

#### Setup

- Laravel valet
    - Once project is cloned, spin up the website at [emailverificationtool.test](http://emailverificationtool.test/)
    <!-- see if there is a setup process for laravel valet -->

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

- Safety concerns
    - validate email

    - I'm only allowing the request values specified (first_name, last_name, email) in an effort to prevent unwanted data coming in the form. I'm also throttling requests to five per hour to prevent several requests per minute.