#!/bin/bash

CHMOD = true
if [[ "$1" = "no-chmod" || "$2" == "no-chmod" ]]
   then
      CHMOD=false
fi

echo "# Bootstrapping your project..."

echo "1.) Updating submodules if existent…"
git submodule sync --quiet || exit $?
git submodule update --init || exit $?
git submodule foreach --recursive --quiet "git submodule sync --quiet && git submodule update --init" || exit $?

echo "2.) Fetching dependencies…"

echo "2.1.) Composer from composer.json..."
composer install

echo "2.2.) Bower from bower.json..."
bower install

if [ "$CHMOD" == true ]
   then
      echo "3.) Setting chmods for caching directories..."
      chmod 0777 app/coffeescript/_cache
      chmod 0777 app/javascripts/_cache
      chmod 0777 app/img/_cache
      chmod 0777 app/styles/_cache
else
      echo "3.) NOT setting any chmods for caching directories..."
fi

echo "# Done: Code away!"