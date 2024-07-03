<?php

use Ghosty\Component\Console\Output\Color\AbstactColor;
use Ghosty\Component\Console\Output\Color\BackgroundColor;
use Ghosty\Component\Console\Output\Color\TextColor;
use Ghosty\Component\Console\Output\Output;
use Ghosty\Component\Console\Output\Text\Text;
use Ghosty\Component\Console\Output\Text\TextBag;

require_once './vendor/autoload.php';

$some = new Text(
    'Some',
    new TextColor(AbstactColor::Default),
    new BackgroundColor(AbstactColor::DarkGray)
);
$text = new Text(
    'text',
    new TextColor(AbstactColor::Red),
    new BackgroundColor(AbstactColor::Green)
);

Output::printStatic([$some, ' - ', $text]);
