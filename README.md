# emoji-php-comparsion
This is a script to do a quick comparsion of emoji detection with php libraries. A simple regex is included as a baseline.

## Install

Run setup.sh it will download the datafiles and install the required modules

## Todo

* Move to a standardized framework, anyone is welcome to make a suggestion. PHPUnit tests would be the option for each library but for compasion of products prehaps someone knows of a better library. Let me know!

## Data

* Emoji https://github.com/milesj/emoji-database/
* Unicode charcters http://www.unicode.org/Public/10.0.0/ucd/UnicodeData.txt

## Libraries

* https://github.com/iamcal/php-emoji
* https://github.com/chefkoch-dev/morphoji
* https://github.com/aaronpk/emoji-detector-php
* https://stackoverflow.com/questions/35961245/how-to-remove-all-emoji-from-string-php

# Results

## Emoji's not detected
### Known emoji's 2389
    has_emoji 92
    emoji_contains_emoji 12
    emoji_morphoji 2
    aaronpk_detech_emoji 0


## False positives
### Valid unicode test data size 31553
     has_emoji 452
     emoji_contains_emoji 391
     emoji_morphoji 27
     aaronpk_detech_emoji 29
