#!/bin/sh
wget https://raw.githubusercontent.com/milesj/emoji-database/master/data/compact/list.json
wget http://www.unicode.org/Public/10.0.0/ucd/UnicodeData.txt
git submodule init
git submodule update
php tester.php
