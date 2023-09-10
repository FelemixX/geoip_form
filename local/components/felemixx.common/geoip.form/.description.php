<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

$arComponentDescription = [
    "NAME" => Loc::getMessage('COMPONENT_FORM_NAME'),
    "DESCRIPTION" => Loc::getMessage('COMPONENT_FORM_DESCRIPTION'),
    "ICON" => "",
    "COMPLEX" => "N",
    "SORT" => 10,
    "PATH" => [
        'ID' => 'felemixx',
        'NAME' => 'felemixx',
        "CHILD" => [
            "ID" => "_form",
            "NAME" => Loc::getMessage('COMPONENT_FORM_PATH_DESCRIPTION'),
            "SORT" => 10,
        ]
    ]
];
