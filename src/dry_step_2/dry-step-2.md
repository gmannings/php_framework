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

The method I chose for managing routes is to create a few objects to house
them and continue the type inference useful in IDEs.

I then updated all the controller logic to redirect to the routes that were
defined by name.

I am now sufficiently irritated by not having namespaces and having to
include PHP files at the right moment, that I have decided to implement
namespaces. This necessitates changing the folder name to use underscores
to follow PSR-4 conventions.

This further enforces type checking and now my IDE knows exactly which
object is in use. At this point I refactored to use an interface
for controllers to be explicit about which functionality they provide
(even if at this point, there is no method to define in the interface
it is still useful to specify that we expect controllers to implement
the ControllerInterface).

## Conclusion

We've improved the readability and functionality of the existing
system, there's one last improvement that can be made before
it becomes trivial to add new pages, and we won't have to worry
about creating a file in the right space, just ensure that
