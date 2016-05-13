#!/bin/sh

app/console assets:install web --symlink
app/console assetic:dump
app/console fos:js-routing:dump
app/console cache:clear
