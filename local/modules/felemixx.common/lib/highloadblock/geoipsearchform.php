<?php

namespace Felemixx\Common\Highloadblock;

class GeoIpSearchForm
{
    protected const GEOIP_SEARCH_FORM = 'GeoIpSearchForm';

    public static function getHlbName(): string
    {
        return static::GEOIP_SEARCH_FORM;
    }

    public static function select(array $parameters): array
    {
        $hlb = new HlbWrap(static::getHlbName());
        $result = [];
        try {
            $query = $hlb->getList(
                $parameters
            );

            while ($fetch = $query->fetch()) {
                $result[] = $fetch;
            }
            return $result;
        } catch (\Throwable $exception) {
            Logger::addLog($exception);
        }

        return $result;
    }

    public static function update(int $id, array $data): bool
    {
        $hlb = new HlbWrap(static::getHlbName());

        try {
            $hlb->update(
                $id,
                $data
            );

            return true;
        } catch (\Throwable $exception) {
            Logger::addLog($exception);
        }

        return false;
    }

    public static function insert(array $data): bool
    {
        $hlb = new HlbWrap(static::getHlbName());

        try {
            $hlb->add(
                $data
            );

            return true;
        } catch (\Throwable $exception) {
            Logger::addLog($exception);
        }

        return false;
    }
}
