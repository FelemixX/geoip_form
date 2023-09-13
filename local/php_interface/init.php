<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\UI\Extension;

$extensions = [
    'ajax',
    'ui.hint',
    'felemixx.geoipform',
];

Loader::includeModule('felemixx.common');
Extension::load($extensions);
