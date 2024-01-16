#!/bin/bash

docker exec -it php_con sh -c "vendor/bin/phpstan analyse -c phpstan.dist.neon"

if [ $? -eq 0 ]
then
  echo "Successful checks PHPStan"
  exit 0
else
  echo "ERRORS script PHPStan" >&2
  exit 1
fi