install the repo on a folder named 'camagru' (important for the db installation).

Run the following command.

$> docker-compose up

When the web_server is ready (When you see INFO success: apache2 entered RUNNING state),
On a new shell run the following command.

$> sh install.sh

Create new tables by going on http://localhost/?page=admin
and click on create tables
