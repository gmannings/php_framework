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

You will need to install dependencies and build the autoloader
using Composer:

```shell
composer install
```

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

### Introduction

1. [Naive implementation](./src/naive/naive-implementation.md)
2. [DRY step 1](./src/dry-step-1/dry-step-1.md)
3. [Templating](./src/templating/templating.md)
4. [Controllers](./src/controllers/controllers.md)
5. [DRY step 2](src/dry_step_2/dry-step-2.md)
6. [Model and Services](src/models_services/models_services.md)

By the end of this process we now have an extensible, if somewhat
basic framework for expanding our application. We have clear separation
between business, presentation, and routing logic. We can extend the
application quickly and not have to repeat ourselves as often.

If we want to apply some security features to the application, we now
have objects that can be extended to cover them. If we want to test
components in the framework, this is straightforward, compared to the
naive implementation that would only be testable through a web browser.

Although the code looks more complicated, there are some defined preferences
for how new features should be added. This should reduce the risk of
new features being added that are a completely different style.

Some benefits of strictly typing through the stack should be
apparent in an IDE now - it is far simpler to make changes and not have
to refresh the page to see the output.

Although we don't need much of this logic currently, the project will
grow and with this foundation we will see how much easier it is to
extend functionality without full rewrites, like we've seen here.

### Common framework features

The next step is to add some features that are pretty common across
frameworks, and to understand how they are implemented at a basic level.

For these examples, we shall be handling various client requests that you
may see on many websites, and that MVC frameworks have solved easily.

1. [Dynamic routes and annotations](src/dynamic_routes/dynamic_routes.md)

