<?php
/**
 * 如果有图片的话，转为base64格式
 * 
 * @desc 方法一、生成word文档
 * @param $content
 * @param string $fileName
 */
function createWord($content = '', $fileName = '')
{
    if (empty($content)) {
        return;
    }
    $content='<html 
            xmlns:o="urn:schemas-microsoft-com:office:office" 
            xmlns:w="urn:schemas-microsoft-com:office:word" 
            xmlns="http://www.w3.org/TR/REC-html40">
            <meta charset="UTF-8" />'.$content.'</html>';
    if (empty($fileName)) {
        $fileName = date('YmdHis').'.doc';
    }
    file_put_contents($fileName, $content);
}

/**
 * @desc 方法二、生成word文档并下载
 * @param $content
 * @param string $fileName
 */
function downloadWord($content, $fileName=''){

    if(empty($content)){
        return;
    }
    if (empty($fileName)) {
        $fileName = date('YmdHis').'.doc';
    }
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename={$fileName}");

    $html = '<html xmlns:v="urn:schemas-microsoft-com:vml"
         xmlns:o="urn:schemas-microsoft-com:office:office"
         xmlns:w="urn:schemas-microsoft-com:office:word" 
         xmlns:m="http://schemas.microsoft.com/office/2004/12/omml" 
         xmlns="http://www.w3.org/TR/REC-html40">';
    $html .= '<head><meta http-equiv="Content-Type" content="text/html;charset="UTF-8" /></head>';

    echo $html . '<body>'.$content .'</body></html>';
}


createWord(file_get_contents('html2word.html'));
downloadWord(file_get_contents('html2word.html'));