<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\UI\Extension;

//Для экономии времени при выполнении тестового задания. Правильно - шапке такое размещать
$asset = Asset::getInstance();
$asset->addJs('https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js');
$asset->addCss('https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css');

$extensions = [
    'felemixx.geoipform',
    'ajax',
    'ui.hint'
];
Extension::load($extensions);
?>
<form class="needs-validation" id="geoip-form">
    <div class="mb-3 text-danger d-none warn-message"><?= Loc::getMessage('INVALID_INPUT') ?></div>
    <div class="mb-3">
        <label for="geoip-form-input" class="form-label"><?= Loc::getMessage('IP_ADDRESS_FIELD') ?></label>
        <input type="text" pattern="^((25[0-5]|(2[0-4]|1\d|[1-9]|)\d)\.?\b){4}$" class="form-control has-validation" id="geoip-form-input" name="geoip-form-input">
    </div>
    <button type="submit" class="btn btn-sm btn-primary"><?= Loc::getMessage('SUBMIT') ?></button>
</form>
<table class="table">
    <thead>
    <tr>
        <th scope="col">$responseFieldName</th>
        <th scope="col">$responseValueFieldName</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Mark</td>
        <td>Otto</td>
    </tr>
    </tbody>
</table>
