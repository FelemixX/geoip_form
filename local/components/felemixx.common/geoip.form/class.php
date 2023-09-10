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
            'createResponseTable' => [
                'prefilters' => [],
            ],
            'processFormData' => [
                'prefilters' => [],
            ]
        ];
    }

    public function createResponseTableAction(array $data): string
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

    public function processFormDataAction($userIp): array
    {
        $result = [
            'success' => false,
            'message' => 'Something went wrong'
        ];
        $userIp = htmlspecialchars(trim($userIp));

        if (!\Felemixx\Common\Api\IpStack::checkIfIpIsValid($userIp)) {
            return $result;
        }

        $select = GeoIpSearchForm::select(
            [
                'select' => [
                    'UF_IP_ADDRESS',
                    'UF_API_RESPONSE',
                ],
                'filter' => [
                    '=UF_IP_ADDRESS'
                ],
                'limit' => 1,
            ]
        );

        if (!empty($select)) {
            $result = [
                'message' => '',
                'html' => static::createResponseTableAction($select[0]),
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
            'html' => static::createResponseTableAction($decoded),
        ];

        return $result;
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
