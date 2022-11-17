# Plugin Demo using Event/Subscriber

## Installation
Requirements
- You need to have [Docker](https://docs.docker.com/engine/installation/) and Docker Compose installed

Run in root folder,
~~~~
cp .env.example .env
~~~~

If are on Linux, change UID, on .env, to the host's user id. You can get the user id by running,
~~~~
id -u
~~~~

Then run,
~~~~
docker-compose build && docker-compose up -d
~~~~

Go to 127.0.0.1:8080/test.php to check that everything works. You should see,
~~~~
Hello World!
~~~~

Install dependencies,
~~~~
docker exec -w /home/serveruser/project/code plugin_fpm composer install
~~~~

"Login" to the container,
~~~~
docker exec -it plugin_fpm bash
~~~~

Exit the container,
~~~~
exit
~~~~

Shutdown containers,
~~~~
docker-compose down
~~~~

# By SocialNerds
* [SocialNerds.gr](https://www.socialnerds.gr/)
* [YouTube](https://www.youtube.com/SocialNerdsGR)
* [Facebook](https://www.facebook.com/SocialNerdsGR)
* [Twitter](https://twitter.com/socialnerdsgr)
