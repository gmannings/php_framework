# Dynamic routes and annotations

Our routes are pretty static at the moment and don't take any arguments,
however a common website requirement is to view single items from a collection,
e.g. a page in the CMS. 

The simplest approach to this is to retrieve data by ID, that is supplied
as part of the URL, e.g. `/page/{pageId}`, dynamic route segments or route parameters.

With the current implementation we'd need to use query parameters, which 
whilst fine, isn't as semantic or RESTful as we might like our website to
be. It also makes caching much easier and may improve SEO as query parameters
are sometimes ignored by search engines.

Currently, the routing logic is abstracted away from the controller method
responsible for rendering. This can make it more complex for developers
to understand the mechanism, or make mistakes when adding a new route.

A simpler approach is to add the route information as metadata that the
framework can detect and determine the right path at runtime.

## Approach

First we will adjust the Route objects to be added as PHP Annotations to
each controller method responsible for rendering pages.

Historically this has been performed using PHPDoc annotations that are
interpreted at runtime, however, PHP 8 added attributes, which we will use
as a language feature that have far less overhead than parsed docblocks.

We will then extend the object to provide route parameters, and resolve
each request that matches the requested URL to the correct controller.

## Implementation
