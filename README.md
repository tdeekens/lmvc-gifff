# LMVC Gifff

## Store your very important gifffs

LMVC Gifff is a small app built using the LMVC Framework and its modules.

A small little app keeping track of your very imporatant gifs so you can find a gif instantly suiting any mood.

## Install LMVC Gifff

LMVC Gifff is based upon [LMVC](https://raw.github.com/scandio/lmvc) and more specifically [LMVC Afresh](https://github.com/scandio/lmvc-afresh).

1. To install your own version just clone the repo `git clone https://github.com/tdeekens/lmvc-gifff.git`.
2. Then `cd lmvc-gifff && sh bootstrap.sh`. This will load all *bower* and *composer* dependencies and setup caching-directories for the [Asset Pipeline](https://github.com/scandio/lmvc-modules/tree/master/lib/Scandio/lmvc/modules/assetpipeline).
3. Do not forget to import the [database](https://github.com/tdeekens/lmvc-gifff/blob/master/sql.sql)
4. Adjust the configuration in the app's [config.json](https://github.com/scandio/lmvc-patat/blob/master/config.json). Which after all must be renamed into *config.json*.
5. Lastly adjust the app's root in the [.sample-htaccess](https://github.com/scandio/lmvc-patat/blob/master/.sample-htaccess)-file to whereever the app resides on your own *localhost*. Don't forget to rename it to *.htaccess*!

Let's solve this problem of maintaining your gifs one and for all!
