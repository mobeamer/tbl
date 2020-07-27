# the-black-list

Working with the KnowWon community a few junior members mentioned that they would like to build an application that host a list of black owned businesses.

This was intended to be a sample site to get us started and allow us to explore DevOps in Azure cloud

# Install

You'll need PHP and mySQL. Latest version should work just fine. I'm not doing anything complicated.

Clone this repo to a folder on your server

```bash
git clone https://github.com/mobeamer/super-care.git
```

## Installing the database

We are using my-sql, we will want to convert this to an azure sql database later.

Create a schema called "tbl" - The Black List

Run "_sql/users.sql" - to create the user that will log into the database, feel free to change the password
Run "_sql/setup.sql" - to create the tables that will be used

## Install app

Open "/client/config" folder
Rename settings-sample.js to settings.js (edit the settings)
You can open the site at this point, it will error out because you don't have an API layer yet.


Rename settings-sample.php to settings.php (edit the settings to your database)

Open http://[root-url]/server/api/test-db-conn.php
This test database connection and make sure it works.


That's it.


## Feature List

* Users can register
* Users can login
* Security is applied
* Logged in user's name appears in UI
* Admin user menu vs normal user menu
* Admin - Can upload Employee List (csv)
* Admin - Can upload Locations List (csv)
* Admin - Can upload Shift List (csv)
* Admin - Can upload Survey Questions List (csv)
* Admin - Can upload Survey Answers List (csv)
* Admin - Can search for employees
* Admin - Can assign a shift to an employee
* Admin - Can remove a shift assigned to an employee
* Admin - Can view survey answers per employee
* Admin - Can view assigned scheduled per employee
* Employee - Can enter/edit in profile information
* Employee - Can enter/edit survey question answers
* Employee - Can enter/edit which locations they are available to work


## Non Functional Features
* Templating across entire site for compatability
* 100% Audit trail on all data

# Register and Login
![ScreenShot](/screenshots/login.png)

# Admin Dashboard
![ScreenShot](/screenshots/dashboard.png)

# Employee Data Screens
![ScreenShot](/screenshots/employee-profile.png)
![ScreenShot](/screenshots/employee-answers.png)
![ScreenShot](/screenshots/employee-locations.png)

# Admin Assign Shift
![ScreenShot](/screenshots/assign-shift.png)




# Cheat Sheet
 
 check-in to master

 ```bash
 git add .
 git commit -m "your comment"
 git push origin master
```


 get the latest

 ```bash
 git pull origin master
```
