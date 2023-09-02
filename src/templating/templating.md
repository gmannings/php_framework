# Templating

The naive implementation mixes application and presentation logic.
This is discouraged for a number of reasons, the following is ChatGPT's
breakdown:

> Mixing presentation and application logic in PHP (or any programming language) can lead to several issues. Here are some of the reasons why it's generally advised against:
>
> 1. **Maintainability**: Mixing both logics makes the code harder to read and maintain. If you need to make changes to the presentation layer, you'll have to sift through application logic and vice versa.
> 
> 2. **Reusability**: If you separate your application logic from your presentation logic, you can easily reuse your application logic in different presentation contexts. For example, the same business logic could be used for a web interface, a CLI tool, or a RESTful API.
> 
> 3. **Testing**: When presentation and application logic are intertwined, it's more difficult to write unit tests for the application logic. Keeping them separate allows you to test your business logic independently of your presentation logic.
> 
> 4. **Scalability**: If your logic is separated, it's easier to scale different parts of your application as needed. For instance, you might scale your application logic servers differently from your presentation servers.
> 
> 5. **Flexibility**: In the future, if you want to change the look of your application or use a different presentation framework, it's much easier if your presentation logic is separate.
> 
> 6. **Security**: Mixing logic can inadvertently expose sensitive application data or processes to the presentation layer. Keeping them separate ensures a clearer boundary, reducing the risk of such exposures.
> 
> 7. **Collaboration**: When working on a team, it's common for designers and frontend developers to work on the presentation layer, while backend developers work on the application logic. Keeping these separate simplifies collaboration, as each team can work on their part without stepping on each other's toes.
> 
> 8. **Performance Optimization**: Separation allows for more targeted performance optimizations. If there's a bottleneck in the presentation layer, you can address it without affecting the application logic and vice versa.
> 
> 9. **Principle of Single Responsibility**: This is a principle of software design that states that a module should have one, and only one, reason to change. By separating concerns, each part of your code has a single responsibility.
> 
> In the context of PHP, it's quite common to see scripts where HTML and PHP are mixed, especially in older applications or smaller scripts. However, as applications grow and evolve, the benefits of separating presentation and application logic become increasingly apparent. Modern PHP frameworks like Laravel, Symfony, and others follow the MVC (Model-View-Controller) pattern which inherently separates these concerns.

By extracting out the presentation, we are providing the V (View) in MVC, and starting 
to address many of these issues.

## Approach

We will use Twig as the templating engine. This is included via Composer
and therefore we need to start using an `autoload.php` to resolve all
the PHP dependencies.

We will use PSR-4 specification for the autoloader.

We will then extract all presentation logic away from the application code,
by adding a templates directory that contains all our presentation logic.

## Application

We add the autoloader to [utils.php](utils.php) as that PHP script is
used by every page. We add the twig setup there too, so it is reusable.

We have a base template that provides a standardised HTML layout.

We then have templates for each page that provide the view logic that is
injected into the base template.

We supply the templates with data variables from the application layer.
The templates use these variables to determine what to render.

All of this is joined up from the application layer, achieving separation.

## Outcome

Now we have cleanly separated our view from our application logic.
Now to make changes to pages, we won't have to wade through complex
application logic to determine which line of HTML to change. We can
also easily test the application logic and the view logic, to ensure
that the application is behaving correctly.
