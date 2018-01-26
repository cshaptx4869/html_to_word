<?php
    require_once 'getWordDocument.php';
    require_once 'MhtFileMaker.class.php';
    /*
        * @param string $content HTML内容
        * @param string $absolutePath 网页的绝对路径。如果HTML内容里的图片路径为相对路径，那么就需要填写这个参数，来让该函数自动填补成绝对路径。这个参数最后需要以/结束
        * @param bool $isEraseLink 是否去掉HTML内容中的链接
     */
    // 获取本地test.html 的内容
    $content = file_get_contents('test.html');
    // 根据HTML代码获取word文档内容
    $filecontent = getWordDocument($content);
    // 下载 doc 文件
    $fileName = 'test';
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Content-Type: application/doc");
    header("Content-Disposition: attachment; filename=" . $fileName . ".doc");
    echo $filecontent;

