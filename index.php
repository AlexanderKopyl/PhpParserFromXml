<?php
include 'vendor/autoload.php';
require('vendor/electrolinux/phpquery/phpQuery/phpQuery.php');
include 'function.php';


$xml = file_get_contents('sitemap.xml');
$service = new Sabre\Xml\Service();
$result = $service->parse($xml);


$page= file_get_contents('https://www.ferplast.com/ru/kontejnery-dlja-korma/feedy.html');

$document = phpQuery::newDocument($page);

$ean = $document->find('.product-ean');
$sku = pq('h1')->getString();
//preg_match_all("/(http|ftp|https):\/\/([\w_-]+(?:(?:\.[\w_-]+)+))([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])?/",$xml,$matches);

foreach ($ean as $el) {
    debug($el->textContent) . '<br>';
}
//foreach ($sku as $el) {
//
//        debug($el->childNodes[0]) . '<br>';
//
//
//}

debug($page);

?>
<!--<table border="1">-->
<!--    <caption>Таблица https://www.ferplast.com</caption>-->
<!--    <tr>-->
<!--        <th>Url</th>-->
<!--        <th>SKU</th>-->
<!--        <th>EAN</th>-->
<!--        <th>Описание</th>-->
<!--        <th>Характеристики</th>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td>34,5</td>-->
<!--        <td>3,5</td>-->
<!--        <td>36</td>-->
<!--        <td>23</td>-->
<!--        <td>23</td>-->
<!--    </tr>-->
<!--</table>-->
