<?php

namespace Felemixx\Common\Highloadblock;

use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Main\Loader;

class HlbWrap
{
    /**
     * @var string
     */
    protected string $entityName = '';

    /**
     * @param string $entityName
     */
    public function __construct(string $entityName)
    {
        $this->entityName = $entityName;
    }

    /**
     * @return string
     */
    public function getEntityName()
    {
        return $this->entityName;
    }

    /**
     * @return int
     * @throws \Bitrix\Main\LoaderException
     */
    public function getHlbId()
    {
        if (Loader::includeModule('highloadblock')) {
            $arHlBlock = $this->getHlbInfo();
            return intval($arHlBlock['ID']);
        }

        return 0;
    }

    /**
     * @param array $parameters
     * @return \Bitrix\Main\DB\Result
     * @throws \Bitrix\Main\ArgumentException
     */
    public function getList(array $parameters = [])
    {
        $class = static::getClass();

        return $class::getList($parameters);
    }

    /**
     * @param array $filter
     * @return int
     */
    public function getCount(array $filter = []): int
    {
        $class = static::getClass();

        return $class::getCount($filter);
    }

    /**
     * @param array $data
     * @return \Bitrix\Main\Entity\AddResult
     * @throws \Exception
     */
    public function add(array $data)
    {
        $class = static::getClass();

        return $class::add($data);
    }

    /**
     * @param mixed $primary
     * @param array $data
     * @return \Bitrix\Main\Entity\UpdateResult
     */
    public function update(mixed $primary, array $data)
    {
        $class = static::getClass();

        return $class::update($primary, $data);
    }

    /**
     * @param mixed $primary
     * @return \Bitrix\Main\Entity\DeleteResult
     */
    public function delete(mixed $primary)
    {
        $class = static::getClass();

        return $class::delete($primary);
    }

    /**
     * @return \Bitrix\Main\Entity\DataManager|null
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\SystemException
     */
    public function getClass()
    {
        if (Loader::includeModule('highloadblock')) {
            $arHLBlock = $this->getHlbInfo();
            $entity = HighloadBlockTable::compileEntity($arHLBlock);
            return $entity->getDataClass();
        }

        return null;
    }

    /**
     * @return array
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\LoaderException
     */
    protected function getHlbInfo()
    {
        if (Loader::includeModule('highloadblock')) {
            return HighloadBlockTable::getList([
                'filter' => [
                    '=NAME' => $this->entityName,
                ],
            ])->fetch();
        }

        return [];
    }
}
