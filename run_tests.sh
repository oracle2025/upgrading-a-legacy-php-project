#!/bin/bash
#Source: https://medium.com/@theophileds/hello-matt-im-glad-you-re-interested-in-the-technical-part-of-this-article-412caad6260f

# Set variable matching to current user who launch this script
export HOST_UID_GID=$(id -u):$(id -g)

# Set variable define custom name related to Project/Server/Branch/Buid_number
# used by docker to have custom instances and network name
COMPOSE_ID=${JOB_NAME:-local}

#
# Runs the django in an isolated docker-compose environment and runs
# our test suite in a container. At the end, everything is cleaned up :)
#
printf "Search and destroy previously running instances of the django env. ...\n"
docker-compose -p $COMPOSE_ID rm -f

printf "Starting the django environment (MySQL + Django)...\n"
docker-compose -p $COMPOSE_ID up --build --abort-on-container-exit --timeout 120

# Let's retrieve the exit code of the previous command (0 if all tests
# passed successfully)
test_status=$?

# Let's give some feedback about the tests to our user. In particular, let's
# show him the docker-compose logs in case a failure occured, this should make
# debugging much easier.
if [ "$test_status" -eq "0" ]; then
  printf "\n\n\n"
  printf "TEST SUITE RAN SUCCESSFULLY ON DJANGO !!\n"
  printf "      <3 <3 <3 FEEL FREE TO MERGE <3 <3 <3\n"
  printf "\n\n\n"
  exit 0
else
  printf "END-TO-END TEST SUITE FAILED ON DJANGO !!\n"
  printf "BEWARE, your code might be flaky somehow. Don't deploy on production unless you're perfectly aware of what you're doing...\n"
  printf "\n\n\n Here are the logs of your environment in case it helps \n\n\n"
  docker-compose -p $COMPOSE_ID logs
  printf "\n\n\n"
  exit 1
fi

printf "Cleaning the Django environment..."
docker-compose -p $COMPOSE_ID rm -f

# This exit code sets the status of the build. If it's 0, we'll see a
# blue/green ball :)
exit $test_status
