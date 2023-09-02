# PHP Framework

A common stumbling block for many developers that I've worked with
is why MVC frameworks are useful, and what problems they are solving.

This project will show some common functionality, albeit, not fully
featured, to demonstrate common problems and pitfalls that MVC 
frameworks typically solve.

The website shall be simple and:

1. Have a homepage
2. Have a login page
3. Allow a user to login
4. Show a welcome message after the user is logged in on the homepage

When using this guide, it is recommended to follow the different
implementations in order, as to understand the challenges, and how MVC
frameworks may have solved them.

## Running

You can run all implementations using the PHP built-in webserver:

```shell
cd ./src/{folder}
php -S localhost:8000
```

Where `{folder}` is the implementation you want to run.

Using your browser navigate to the address
[http://localhost:8000](http://localhost:8000) and try logging in. The
user credentials for a successful login are:

Username: `admin`
Password: `password123`

## Contents

1. [Naive implementation](./src/naive/naive-implementation.md)
2. [DRY step 1](./src/dry-step-1/dry-step-1.md)
3. [Templating](./src/templating/templating.md)
4. [Controllers](./src/controllers/controllers.md)
