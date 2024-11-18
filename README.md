# basic-messaging-api (Derek McKinnon)

This is a very basic test Laravel 11 API that took around 3-4 hours to do,
as there were quite a few changes since the last Laravel version I had to catch up on.

## General steps to completion:

- Evaluated several different options of frameworks / no framework for completing the requirements
  - Decided that even though it was a bit overkill, Laravel had all the built-in goodies for database migrations and validation
  - Decided to use Laravel Sail as well to ease back into PHP development without the need to install all the prerequisites
- Added API support into Laravel and added the basic routes and requests
- Updated migrations to support the messages and desired user table structure
- Worked one by one on user functions, fixing/tweaking framework values as needed
- Worked one by one on messaging functions
- Various cleanups and double-checking to make sure the project is somewhat presentable

## Caveats / Issues with the Design:

- While there is a login function, it only validates the user/pass and doesn't issue any kind of token or cookie
  - In real life, we would use an IdP to secure an API
- All endpoints are free and open as this is just a test
- I personally wouldn't use JSON bodies with `GET` requests as it is somewhat frowned upon
  - With proper authentication, a lot of the `sender_` or `requester_` params can be implicit
- I would probably look deeper into ways of getting the framework to format more exceptions as JSON and have a lookup table for error codes
  - This would prevent accidental uses of the wrong codes, and centralize things a little bit more
