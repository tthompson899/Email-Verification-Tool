## Email Verification Tool

#### Setup

- Laravel valet
    - Once project is cloned, spin up the website at emailverificationtool.test
    <!-- see if there is a setup process for laravel valet -->

- Seed User table with data
    - `php artisan db:seed`

#### Project Approach
- Create Appropriate API Endpoints
    - verify - To verify the email address is not already in the database
        - If already in db, return error message
    - create - Once verified, email address should be added to db
        - once created, return success message
    - admin/list all - Admin endpoint that lists all email addresses in db

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

- Create Test Data Tool
    - command that populates the database with test data
        - should be accessed by admin

- Provide tests
    - test for verify email
    - test for creating email
    - test to ensure data is in db?

- Safety concerns
    - validate email
    - 