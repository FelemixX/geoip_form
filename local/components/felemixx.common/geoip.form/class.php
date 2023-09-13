<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Felemixx\Common\Highloadblock\Logger;
use Felemixx\Common\Highloadblock\GeoIpSearchForm;
use \Bitrix\Main\Engine\Contract\Controllerable;

class GeoIpForm extends CBitrixComponent implements Controllerable
{
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
        $decodedData = json_decode($data['UF_API_RESPONSE'], true); //TODO
        //ip, country_code, region_name, country_name
        $html = <<<HTML
        <table class="mt-2 table">
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
        HTML;

        return $html;
    }

    public function processFormDataAction(string $userIp): array
    {
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
                $info = static::getInfoByIp($userIp);
                $result = [
                    'success' => true,
                    'html' => static::createResponseTable($info),
                ];

                return $result;
            }

            $requestData = \Felemixx\Common\Api\IpStack::getByIp($userIp);
            if (!$requestData) {
                return $result;
            }

            $decoded = json_decode($requestData, true);
            if (in_array('error', $decoded)) {
                return $result;
            }

            $result = [
                'success' => true,
                'html' => static::createResponseTable($decoded),
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
                'runtime' => [
                    new ORM\Fields\ExpressionField('CNT', 'COUNT(*)')
                ],
                "cache" => ["ttl" => 3600],
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
