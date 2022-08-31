<?php
/**
 * @author Nine Two <theninetwo@163.com>
 * @date   2022/8/31 11:23 AM
 */
namespace TheNineTwo\CutTime;

class CutTime {
    /**
     * @var Box[]array
     */
    private static $timeBoxes = [];

    /**
     * @param string $boxName
     * @param false  $overWrite
     * @return Box
     * @throws \Exception
     */
    public static function start($boxName, $overWrite = true) {
        if (!isset(self::$timeBoxes[$boxName])) {
            self::$timeBoxes[$boxName] = new Box();
        } else {
            if (!$overWrite) {
                throw new \Exception(sprintf('box name [%s] has registered', $boxName), 1);
            } else {
                self::$timeBoxes[$boxName] = new Box();
            }
        }
        return self::$timeBoxes[$boxName];
    }

    public static function cut($boxName, $cutName) {
        if (isset(self::$timeBoxes[$boxName])) {
            return self::$timeBoxes[$boxName]->cut($cutName);
        }
        return self::start($boxName)->cut($cutName);
    }

    public static function node($boxName, $cutName) {
        if (isset(self::$timeBoxes[$boxName])) {
            return self::$timeBoxes[$boxName]->node($cutName);
        }
        return [];
    }

    public static function all($boxName = 'default') {
        if (empty($boxName)) {
            return array_map(function ($box) {
                return $box->all();
            }, self::$timeBoxes);
        }
        if (isset(self::$timeBoxes[$boxName])) {
            return self::$timeBoxes[$boxName]->all();
        }
        return [];
    }
}