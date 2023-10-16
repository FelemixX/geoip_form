<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Felemixx\Common\Highloadblock\Logger;
use Felemixx\Common\Highloadblock\GeoIpSearchForm;
use \Bitrix\Main\Engine\Contract\Controllerable;

class GeoIpForm extends CBitrixComponent implements Controllerable
{
    protected const CACHING_TIME = 3600;

    public function configureActions()
    {
        return [
            'processFormData' => [
                'prefilters' => [],
            ]
        ];
    }

    protected static function createResponseTable(array $data): string
    {
        $responseFieldName = Loc::getMessage('RESPONSE_FIELD');
        $responseValueFieldName = Loc::getMessage('RESPONSE_FIELD_VALUE');
        //ip, country_code, region_name, country_name
        $html = "<table class=\"mt-2 table\">
            <thead>
                <tr>
                    <th scope=\"col\">$responseFieldName</th>
                    <th scope=\"col\">$responseValueFieldName</th>
                </tr>
            </thead>
            <tbody>";
        foreach ($data as $key => $value) {
            if (is_null($value)) {
                continue;
            }

            if (is_array($value)) {
                foreach ($value as $valueKey => $values) {
                    if (is_null($values)) {
                        continue;
                    }

                    $html .= "<tr>";
                    $html .= "<td>$valueKey</td>";
                    $html .= "<td>$values</td>";
                    $html .= "</tr>";
                }
            } else {
                $html .= "<tr>";
                $html .= "<td>$key</td>";
                $html .= "<td>$value</td>";
                $html .= "</tr>";
            }
        }
        $html .= "</tbody>
        </table>";

        return $html;
    }

    public function processFormDataAction(string $userIp): array
    {
        if (!check_bitrix_sessid()) {
            throw new \Exception('Session probably expired');
        }

        $result = [
            'success' => false,
            'message' => 'Something went wrong'
        ];

        try {
            $userIp = htmlspecialchars(trim($userIp));

            if (!\Felemixx\Common\Api\IpStack::checkIfIpIsValid($userIp)) {
                return $result;
            }

            if (static::checkIfExists($userIp)) {
                $query = static::getInfoByIp($userIp);
                $info = json_decode($query['UF_API_RESPONSE'], true);
                return [
                    'success' => true,
                    'html' => static::createResponseTable($info),
                ];
            }

            $requestData = \Felemixx\Common\Api\IpStack::getByIp($userIp);
            if (!$requestData || in_array('error', $requestData)) {
                return $result;
            }

            GeoIpSearchForm::insert([
                'UF_IP_ADDRESS' => htmlspecialcharsbx($userIp),
                'UF_API_RESPONSE' => json_encode($requestData),
                'UF_SERVICE_NAME' => \Felemixx\Common\Api\IpStack::API_SERVICE_NAME,
            ]);

            return [
                'success' => true,
                'html' => static::createResponseTable($requestData),
            ];
        } catch (\Throwable $exception) {
            Logger::addLog($exception);
        }

        return $result;
    }

    protected static function checkIfExists(string $userIp): bool
    {
        $select = GeoIpSearchForm::select(
            [
                'select' => [
                    'UF_IP_ADDRESS',
                    'UF_API_RESPONSE',
                ],
                'filter' => [
                    '=UF_IP_ADDRESS' => $userIp,
                ],
                'limit' => 1,
                'count_total' => true,
                'cache' => [
                    'ttl' => static::CACHING_TIME]
                ,
            ]
        );

        return $select[0] != 0;
    }

    protected static function getInfoByIp(string $userIp): array
    {
        $select = GeoIpSearchForm::select(
            [
                'select' => [
                    'UF_IP_ADDRESS',
                    'UF_API_RESPONSE',
                ],
                'filter' => [
                    '=UF_IP_ADDRESS' => $userIp,
                ],
                'limit' => 1,
                "cache" => ["ttl" => 3600],
            ]
        );

        return $select[0];
    }

    public function executeComponent()
    {
        if ($this->startResultCache()) {
            try {
                $this->setResultCacheKeys([]);
                $this->includeComponentTemplate();
            } catch (\Throwable $exception) {
                $this->abortResultCache();
                Logger::addLog($exception);
            }
        }
    }
}
