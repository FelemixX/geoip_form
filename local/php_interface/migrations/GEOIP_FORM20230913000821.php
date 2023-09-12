<?php

namespace Sprint\Migration;


class GEOIP_FORM20230913000821 extends Version
{
    protected $description = "";

    protected $moduleVersion = "4.2.4";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $hlblockId = $helper->Hlblock()->saveHlblock(array (
  'NAME' => 'GeoipSearchForm',
  'TABLE_NAME' => 'geoip_search_form',
  'LANG' => 
  array (
    'ru' => 
    array (
      'NAME' => 'Форма GeoIP поиска',
    ),
    'en' => 
    array (
      'NAME' => 'GeoIP search form ',
    ),
  ),
));
        $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_SERVICE_NAME',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => 'UF_SERVICE_NAME',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'SIZE' => 20,
    'ROWS' => 1,
    'REGEXP' => '',
    'MIN_LENGTH' => 0,
    'MAX_LENGTH' => 0,
    'DEFAULT_VALUE' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'br' => '',
    'en' => 'Service name',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Название сервиса',
    'ua' => '',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'br' => '',
    'en' => 'Service name',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Название сервиса',
    'ua' => '',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'br' => '',
    'en' => 'Service name',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Название сервиса',
    'ua' => '',
  ),
  'ERROR_MESSAGE' => 
  array (
    'br' => '',
    'en' => 'Service name',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Название сервиса',
    'ua' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'br' => '',
    'en' => 'Service name',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Название сервиса',
    'ua' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_IP_ADDRESS',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => 'UF_IP_ADDRESS',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'Y',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'SIZE' => 20,
    'ROWS' => 1,
    'REGEXP' => '',
    'MIN_LENGTH' => 0,
    'MAX_LENGTH' => 0,
    'DEFAULT_VALUE' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'br' => '',
    'en' => 'User IP address',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'IP адрес пользователя',
    'ua' => '',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'br' => '',
    'en' => 'User IP address',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'IP адрес пользователя',
    'ua' => '',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'br' => '',
    'en' => 'User IP address',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'IP адрес пользователя',
    'ua' => '',
  ),
  'ERROR_MESSAGE' => 
  array (
    'br' => '',
    'en' => 'User IP address',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'IP адрес пользователя',
    'ua' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'br' => '',
    'en' => 'User IP address',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'IP адрес пользователя',
    'ua' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_API_RESPONSE',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => 'UF_API_RESPONSE',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'SIZE' => 20,
    'ROWS' => 1,
    'REGEXP' => '',
    'MIN_LENGTH' => 0,
    'MAX_LENGTH' => 0,
    'DEFAULT_VALUE' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'br' => '',
    'en' => 'API Response',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Ответ API',
    'ua' => '',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'br' => '',
    'en' => 'API Response',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Ответ API',
    'ua' => '',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'br' => '',
    'en' => 'API Response',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Ответ API',
    'ua' => '',
  ),
  'ERROR_MESSAGE' => 
  array (
    'br' => '',
    'en' => '',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => '',
    'ua' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'br' => '',
    'en' => 'API Response',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Ответ API',
    'ua' => '',
  ),
));
        }

    public function down()
    {
        //your code ...
    }
}
