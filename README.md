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
- Change default profile picture in profile settings
- View Posts that user has posted in user homepage
- View all Posts (able to see author of posts, number of comments, posts created date)
- View full Post

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

## Deployment Details

## Installation Guide

## Tech Stack Used

- HTML
- CSS
- Bootstrap
- PHP
- Javascript


## License

This project is licensed under the [MIT License](LICENSE).
