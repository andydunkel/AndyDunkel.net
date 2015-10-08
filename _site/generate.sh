#!/bin/sh
jekyll build
git add * -A
git commit -m"Update"
git push -u origin master
curl http://updater.andydunkel.net/AndyDunkel.net/update.php