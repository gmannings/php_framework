# DRY Step 1

"Don't Repeat Yourself", or DRY, is common nomenclature in programming.
For functionality that is going to be re-used, or to organise code into
more readable chunks, refactoring into functions or classes is essential.

## What should be DRYed up?

Even in the naive implementation we can see some functinality that will be
needed in the future:

1. Starting the session
2. Finding whether a user is logged in or not
3. Redirecting to another PHP file
4. A central store of usernames and passwords

## Approach

As the naive implementation is still basic, we'll create functions in [utils.php](utils.php)
to cover off this functionality, and to begin the session.

## Application

Replacing the inline code with functions and session start has reduced
duplication, and in many ways, made the code easier to understand.

This is the foundation with which we'll address the application and
presentation logic being mixed.