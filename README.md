# emoji-php-comparsion
This is a script to do a quick comparsion of emoji detection with php libraries. A simple regex is included as a baseline.

## Install

Run setup.sh it will download the datafiles and install the required modules

## Libraries

* https://github.com/iamcal/php-emoji
* https://github.com/aaronpk/emoji-detector-php
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
