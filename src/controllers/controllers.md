# Controllers

We now have a number of PHP files that hardly have any code within. We also
have a some related groups of functionality, namely:

* Home
* Login

Over time it is expected that the application will grow and have similar
grouped pieces of functionality. We can group the related pieces of 
functionality into a class (for easier management) and share a common
approach to rendering, rather than having to rely on calling Twig each
time. Controllers are a good term for managing this.

## Approach

We will build two controllers, one to handle the homepage, and one to
handle the login logic.

Each controller will return the information needed by Twig to create a view.

We will use classes for the controllers so if we want to use inheritance
or traits we can do so easily.

## Implementation

This represents the biggest change to the codebase so far. We will use some
concepts that may be unfamiliar at first, or not used in some PHP frameworks,
however they are valuable to understand.

### View handling and Data Transport Objects (DTOs)

Each controller will return a View Data Transport Object, or DTO. This
view DTO will be immutable (it is write-once), so it cannot be modified
later in the stack. This is good practice if possible as any readonly
object properties are easier to debug as they can only be set once. 

The use
of DTOs (or similar) is useful when writing code within an IDE that handle
code completion and when using code quality tools such as PHPCS. The data
being transferred has types, so seeing any misuse of the object properties is
easy for the IDE to identify. Some frameworks don't use them and still 
prefer associative arrays for passing data around, however, I prefer DTOs
for the certainty that we receive from them.

The View DTO will be supplied back from the controller and passed to a
renderer that has a copy of the Twig configuration and renders the page.
This allows even more encapsulation of functionality, and the beginnings
of a system that follows Single Responsibility principle.

The view renderer shall be configured in [utils.php](utils.php) along
with all the other code that we need to run the application.

### Encapsulation and inheritance

Now we've started to looks at [utils.php](utils.php), we can see a function
that is going to be purely used by controllers (at least currently).

We will move the `redirect_to` method to a `BaseController` class
and allow each controller to access this protected method through inheritance.

By maintaining this method within a `BaseController`, we simplify the
organisation of code (each controller will inherit from this base), and
make it easier to understand the program flow.

### Simplifying loading

Currently, we haven't added any namespaces to our classes, so we will
need to load them manually. This is easiest done in a single point in the
application, which is currently [utils.php](utils.php).

This is where we will instantiate all controllers and the view renderer.
These can be used later as required by the pages.

### Adjusting the page PHP files

Now there's very little left in the page PHP files. Take for example
[login.php](login.php), it is reduced to:

```php
<?php
include 'utils.php';

$viewRenderer->render(
  $loginController->challenge()
);
```

It calls a controller endpoint, and then renders the response. This is a
candidate for simplification, which we will look at later, as all PHP
pages perform the same logic.
