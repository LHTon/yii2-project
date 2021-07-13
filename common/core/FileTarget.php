<?php

namespace common\core;


class FileTarget extends \yii\log\FileTarget
{
    public function export() {
        $this->logFile = $this->getFilePath($this->logFile);
        parent::export();
    }

    public function getFilePath($path) {
        $now = time();
        $path = preg_replace(['/202\d{1}-\d{2}-\d{2}/', '/202\d{1}-\d{2}/'], [date('Y-m-d', $now), date('Y-m', $now)], $path);
        return $path;
    }
}
