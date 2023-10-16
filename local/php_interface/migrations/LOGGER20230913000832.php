<?php

namespace Sprint\Migration;


class LOGGER20230913000832 extends Version
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
  'NAME' => 'Logger',
  'TABLE_NAME' => 'logger',
  'LANG' => 
  array (
    'ru' => 
    array (
      'NAME' => 'Логи',
    ),
    'en' => 
    array (
      'NAME' => 'Logs',
    ),
  ),
));
        $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_TRACE_STRING',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => 'UF_TRACE_STRING',
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
    'en' => 'Trace',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Трейс',
    'ua' => '',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'br' => '',
    'en' => 'Trace',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Трейс',
    'ua' => '',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'br' => '',
    'en' => 'Trace',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Трейс',
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
    'en' => 'Trace',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Трейс',
    'ua' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_ERROR_TIMESTAMP',
  'USER_TYPE_ID' => 'datetime',
  'XML_ID' => 'UF_ERROR_TIMESTAMP',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'Y',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'DEFAULT_VALUE' => 
    array (
      'TYPE' => 'NOW',
      'VALUE' => '',
    ),
    'USE_SECOND' => 'Y',
    'USE_TIMEZONE' => 'N',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'br' => '',
    'en' => 'Timestamp',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Время',
    'ua' => '',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'br' => '',
    'en' => 'Timestamp',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Время',
    'ua' => '',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'br' => '',
    'en' => 'Timestamp',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Время',
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
    'en' => 'Timestamp',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Время',
    'ua' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_ERROR_DATA',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => 'UF_ERROR_DATA',
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
    'en' => 'Data',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Данные',
    'ua' => '',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'br' => '',
    'en' => 'Data',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Данные',
    'ua' => '',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'br' => '',
    'en' => 'Data',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Данные',
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
    'en' => 'Data',
    'fr' => '',
    'it' => '',
    'la' => '',
    'pl' => '',
    'ru' => 'Данные',
    'ua' => '',
  ),
));
        }

    public function down()
    {
        //your code ...
    }
}
