# DRY step 2

After the last refactor, the codebase is starting to look more like an MVC
framework. As we still have physical PHP files for each page, we would still
have to have a folder structure that matches the URL structure, plus we 
would need to basically repeat ourselves with calling the renderer. Instead,
let's add a router that can manage this for us, using configuration.

## Approach

We will create a router that will manage the routing of URL requests to
controller endpoints. The renderer shall be called to handle each controller
method response.

We will delete all of the individual PHP files that are currently rendering
the page.

We will rename `utils.php` to `boostrap.php` to better reflect its use.

We will rework `index.php` to be an entrypoint that calls `bootstrap.php`.

Eventually we will have a routing system that does not need physical files
to provide a page response.

We will wrap this up by implementing namespaces so the autoloader can find
all controllers.

## Implementation