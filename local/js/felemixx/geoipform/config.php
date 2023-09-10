<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

return [
    'css' => 'dist/geoipform.bundle.css',
    'js' => 'dist/geoipform.bundle.js',
    'rel' => [
		'main.polyfill.core',
	],
    'skip_core' => true,
];
