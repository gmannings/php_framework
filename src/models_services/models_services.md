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
