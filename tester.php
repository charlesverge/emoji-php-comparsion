<?php
require_once("./lib.php");
// From https://raw.githubusercontent.com/milesj/emoji-database/master/data/compact/list.json
// Unicode chars from http://www.unicode.org/Public/10.0.0/ucd/UnicodeData.txt

$testdata = json_decode(file_get_contents('list.json'), true);

$methods = [
    'has_emoji', // https://stackoverflow.com/questions/35961245/how-to-remove-all-emoji-from-string-php
    'emoji_contains_emoji', // https://github.com/iamcal/php-emoji
    'emoji_morphoji', // https://github.com/chefkoch-dev/morphoji/
    'aaronpk_detech_emoji', //https://github.com/aaronpk/emoji-detector-php
];
$results = [];
foreach ($methods as $function) {
    $results[$function] = [];
}

foreach ($testdata as $char) {
    foreach ($methods as $function) {
        $text = isset($char['unicode']) ? $char['unicode'] : '';
        $text = isset($char['emoji']) ? $char['emoji'] : $text;
        if (empty(call_user_func($function, $text))) {
            $results[$function][] = $text;
        }
    }
}
echo "Emoji not detected\n";
print_r($results);

$falsepositiveresults = [];
foreach ($methods as $function) {
    $falsepositiveresults[$function] = [];
}

$fd = fopen("UnicodeData.txt", "r");
$count = 0;
while ($l = fgetcsv($fd, 0, ';')) {
    if (!preg_match("/control/", $l[1])) {
        $count++;
        $text = mb_convert_encoding('&#'.$l[0].';', 'UTF-8', 'HTML-ENTITIES');
        foreach ($methods as $function) {
            if (call_user_func($function, $text)) {
                $falsepositiveresults[$function][] = $text;
            }
        }
    }
}
echo "Emoji incorrectly detected\n";
print_r($falsepositiveresults);

echo "\n\n";
echo "## Emoji's not detected\n";
echo "### Known emoji's ".count($testdata)."\n";
foreach ($methods as $function) {
    echo "    $function ".count($results[$function])."\n";
}
echo "\n\n";
echo "## False positives\n";
echo "### Valid unicode test data size $count\n";
foreach ($methods as $function) {
    echo "     $function ".count($falsepositiveresults[$function])."\n";
}
