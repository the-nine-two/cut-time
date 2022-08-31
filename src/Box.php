<?php
/**
 * @author Nine Two <theninetwo@163.com>
 * @date   2022/8/31 11:23 上午
 */
namespace TheNineTwo\CutTime;

class Box {
    /**
     * @var float $start
     */
    private $start;

    /**
     * @var array
     */
    private $cutInfo = [];

    /**
     * @var float $preCutTime
     */
    private $preCutTime;

    public function __construct() {
        $this->start = $this->preCutTime = microtime(true) * 1000;
    }

    /**
     * @param $cutName
     */
    public function cut($cutName) {
        $time                    = microtime(true) * 1000;
        $this->cutInfo[$cutName] = [
            'total_time' => intval($time - $this->start),
            'node_time'  => intval($time - $this->preCutTime)
        ];

        return $this->cutInfo[$cutName];
    }

    /**
     * @return array
     */
    public function all() {
        if (empty($this->cutInfo)) {
            $this->cut('box-end');
        }
        return $this->cutInfo;
    }

    /**
     * @param $cutName
     * @return array
     */
    public function node($cutName) {
        if (empty($this->cutInfo)) {
            $this->cut('box-end');
        }
        return $this->cutInfo[$cutName] ?? [];
    }
}