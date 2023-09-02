# Naive implementation

PHP is flexible, and as such it is quite straightforward to build a
website using basic code. This implementation is something that a beginner
programmer might write when first encountering PHP.
This implementation does not connect to a database (although it is
trivial to add, it is not necessary to demonstrate issues).

## Understanding

Is this code easy to follow? Are there any problems that you can identify,
with this basic functionality?

Questions to ask yourself are:
* How complex is it to add new pages
* How do we ensure that webpages are consistent across the site?
* Are there any security flaws?

## Critique

Whilst this implementation works, which is the foundation of any software,
and allows a user to login and create a session, it has multiple problems:

* mixes presentation logic along with application logic, which will become confusing
* performs no security checks (e.g. CSRF)
* each page requires a new PHP file, which could be confusing once the site grows

The next stage is to fix the mix of presentation and application logic.