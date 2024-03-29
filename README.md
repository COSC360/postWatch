[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-24ddc0f5d75046c5622901739e7c5dd533143b0c8e959d652212380cedb1ea36.svg)](https://classroom.github.com/a/enf2qyfT)
![logo](./docs/logo.png)


# PostWatch


## Index

- [Summary](#summary)
- [Functionalities Added](#functionalities-added)
- [Features Added](#features-added)
- [Deployment Details](#deployment-details)
- [Installation Guide](#installation-guide)
- [Tech Stack Used](#tech-stack-used)
- [License](#license)



## Summary

PostWatch is a full-stack website designed to cater to the needs of watch enthusiasts around the
world. It is a blog site that allows users to create an account and share their love for watches by
posting images and writing content about their experiences with different timepieces. The website
provides a platform for users to connect with other watch enthusiasts and interact with their posts
through commenting and liking.

Our website is going to have a sleek and modern look with consistent black and gray color themes
throughout. We're using the latest version of Bootstrap (v.5) to ensure that our web pages look sharp
and professional. Plus, we've designed a footer and margins that will give all our pages a cohesive
and polished feel.

This report aims to provide an in-depth analysis of the PostWatch website, including its design,
functionality, and user experience. We will examine the features of the website, the technology behind
it, and its potential for growth and expansion in the future.
 
 
 ## Functionalities Added

Non-users:
- Able to view all posts (not able to see author of post or when post was created)
- Search posts by name using search bar
- Navigate landing page
- Sign Up

Users:
- Sign Up
- Create Posts
- Comment on Posts
- Like Posts
- Change default profile picture in profile settings
- View Posts that user has posted in user homepage
- View Total number of Likes and Comments received in user homepage
- View all Posts (able to see author of posts, number of comments, posts created date)
- Filter Posts on latest, top likes, top comments
- View full Post
- Profile settings to change default profile picture, update email, update username
- Reset password if forgotten

Admin:
- Sign In
- Delete Users
- Delete Posts
- View site statistics on number of posts created and interactions on each post


 ## Features Added

- Site has client-side security on sign-in, sign-up forms. Performs regex matching to determine
correct input.

- Server-side security implemented by using prepared statements, hashing passwords, session
ids of users, and page redirections.

- Responsive design for all device sizes.

- Alerts on pages and forms for better navigation.

- Post Images and user profile pictures stored in the database.

- Reset password functionality sends reset password link to user's email using php-mailer.

## Deployment Details

Site is deployed to cosc360.ok.ubc.ca server

## Installation Guide

- Download and install Composer on your local machine. You can do this by following the installation instructions on the Composer website: https://getcomposer.org/doc/00-intro.md.
- Clone the PostWatch repository from GitHub to your local machine using the following command: ``` git clone https://github.com/COSC360/postWatch ```
- Navigate to the project directory using the terminal or command prompt: ``` cd PostWatch ```
- Install the dependencies listed in the composer.json file by running the following command: ``` php composer.phar install ```
- Import the sql file from database directory into your database using a tool such as phpMyAdmin or the MySQL command line interface.
-  Configure database.php file by your database credentials
- Start the PHP development server by running the following command in the project directory: ``` php -S localhost:8000 ```
- Visit http://localhost:8000 in your web browser to enjoy the postWatch website.


## Tech Stack Used

- HTML
- CSS
- Bootstrap5
- PHP
- Javascript
- MySQL
- PHPUNIT
- PHPMAILER


## License

This project is licensed under the [MIT License](LICENSE).
