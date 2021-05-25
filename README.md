### Overview
The following repository is built on Laravel.

### Configuration

In order to run the system, there must exist a proper configuration on the `/.env ` file of the main folder, with an available `mysql` connection with an empty database.

Once the configuration is properly set, the next step is to run the existing migrations (via `php artisan migrate`).

After the migrations have been run, the database must be seeded. This process will generate the base admin user (if it doesn't exist yet) and will fetch the posts from the HTTP endpoint, assigning the author as the initial user (admin user) to those posts and storing them into the database.
After the migrations have been run successfully and it has been seeded, the system can be started via `php artisan serve`.