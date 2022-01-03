<?php

// Autoload files using the Composer autoloader.
require_once __DIR__ . '/vendor/autoload.php';

use Main\Main;
use Classes\CsvFile;
use Classes\PhoneCode;
use Classes\Table;

$file = new CsvFile();
$file = $file->reading();
$phone_code = (new PhoneCode())->getPhoneCodes();
$entry = new Main();
echo((new Table())->get_table($entry->printData($file,$phone_code)));

