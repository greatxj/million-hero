<?php

$app = require __DIR__ . '/bootstrap/app.php';



$testShell = [
    [
        'shell' => 'adb version',
        'count' => 1,
        'msg'   =>  '未安装 abd 驱动',
    ],
    [
        'shell'   => 'adb devices',
        'count'   => 2,
        'msg'     =>  '未检测到手机连接',
    ],
];

foreach ($testShell as $shell) {

    list($code, $output) = \App\Foundation\Command::exactExec($shell['shell']);

    // 异常状态码
    if ($code !== 0) {
        dd(implode(' --- ', $shell['msg']));
    }

    if (count($output) != $shell['count']) {
        dd($shell['msg']);
    }
}

dd('SUCCESS');

