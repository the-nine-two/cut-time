# 时间计算

做简单的耗时统计。 会计算出总耗时和打点间距耗时。 

## 全局使用

```php 
    TheNineTwo\CutTime\CutTime::start('system', false);
    
    sleep(1);
    TheNineTwo\Cuttime\CutTime::cut('system', 'node1');
    
    sleep(2);
    TheNineTwo\Cuttime\CutTime::cut('system', 'node2');
    
    $allTotal = TheNineTwo\Cuttime\CutTime::all('system');
    
    var_dump($allTotal);
```

## 模块内使用

```php
    $timeBox = new \TheNineTwo\CutTime\Box();
    sleep(1);
    $timeBox->cut('node1');
    usleep(200);
    $timeBox->cut('node2');
    $all = $timeBox->all();
    var_dump($all);
```