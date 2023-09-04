# Models and services

We currently have very little information being collected and validated,
which means the original implementation is very straightforward, but has
left this logic within a controller. Ideally we want our controller to be
as slim as possible.

Currently, the [LoginController](controllers/LoginController.php) contains
validation logic of checking if a user exists. Currently, there's only
one user, but if we wanted to extend this, or connect to a DB then this
would become unwieldy and our controller would become cumbersome.

We're holding password in plaintext currently, which is also a very, very, 
bad practice, so we will refactor this logic into a Model and a Service,
along with a DTO.

## Approach

We will create a User object to act as a manager for data persistence, 
that will be called by a User service to handle the logging in (business
logic). This is a common separation of concerns that is extensible 
as the framework progresses.

The User object will only have a few properties at the moment, however
we would like there to be communication between the controller and the
service, that is easy to follow and predict. For this we will use a DTO
that only allows the fields to be passed from controller to service. We
will deserialize the POST request into the DTO so any additional fields
are ignored.

## Implementation

I've added a [DTO](model/UserLoginDto.php) that allows properties to be set 
from an array.
This is just one approach to some 'magic' that some frameworks perform with
requests and ensuring type safety. We will expand this when we improve 
the 'framework' nature of the code we have so far.

**Note:** Many PHP frameworks don't use DTOs in this manner. Instead 
`Request` objects contain sanitized data properties, allowing you
to decide how to deserialize into objects if you wish, or pass data around
in associative arrays. For this example I am using a heavily typed
approach as it is easier to prevent bugs, and is a personal preference.

The [UserModel](model/UserModel.php) is a relatively simple model, that
if we want to would be straightforward to convert to an ORM using a framework
or adding our own. For now it is a datastore, and the only protection
logic in place is for setting the password into an encrypted version,
so that if the model is called outside the UserService, at least this
level of protection is in place.

The [UserService](services/UserService.php) has been updated to handle 
all the business logic for authenticating a user, whereas the controller
is now just funneling data between service and the session.
