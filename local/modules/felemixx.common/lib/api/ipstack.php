<?php

namespace Felemixx\Common\Api;

class IpStack
{
    protected const BASE_API_URL = 'http://api.ipstack.com';
    protected const API_KEY = '1cbaacd5d9562f45f01ce69a39e91226';
    protected const IP_REGEXP = '/^((25[0-5]|(2[0-4]|1\d|[1-9]|)\d)\.?\b){4}$/';

    public static function getByIp (string $ip)
    {
        return static::makeRequest($ip);
    }

    public static function getApiUrl(): string
    {
        return static::BASE_API_URL;
    }

    public static function getApiKey(): string
    {
        return static::API_KEY;
    }

    public static function getIpRegExp(): string
    {
        return static::IP_REGEXP;
    }

    protected static function makeRequest(string $ip): false|string
    {
        if (!static::checkIfIpIsValid($ip)) {
            return false;
        }

        $uri = new \Bitrix\Main\Web\Uri(static::getApiUrl());

        $uri->setPath("/$ip/");
        $uri->addParams([
                'access_key ' => static::API_KEY,
            ],
        );

        $httpClient = new \Bitrix\Main\Web\HttpClient();

        return $httpClient->get(str_replace('%20', '', $uri->getUri())); //Битрикс добавляет параметру лишний пробел xD
    }

    public static function checkIfIpIsValid(string $ip): bool
    {
        return is_int(preg_match(static::getIpRegExp(), $ip));
    }
}
