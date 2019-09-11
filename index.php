<?php
include 'vendor/autoload.php';
require('vendor/electrolinux/phpquery/phpQuery/phpQuery.php');
include 'function.php';
//$page= file_get_contents("https://www.ferplast.com/ru/sobaki.html" );
// $document = phpQuery::newDocument($page);
//    $ean = $document->find('.product-ean');
//    $ean = $ean->getString();
//
//    debug(empty($ean));

$xml = file_get_contents('sitemap.xml');
$service = new Sabre\Xml\Service();
$results = $service->parse($xml);




//preg_match_all("/(http|ftp|https):\/\/([\w_-]+(?:(?:\.[\w_-]+)+))([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])?/",$xml,$matches);

echo "<table border='1'>    
    <tr>
        <th>Url</th>
        <th>EAN</th>
        <th>Описание</th>
    </tr>";

foreach ($results as $result){
    $page= file_get_contents($result['value'][0]['value'] );
    $document = phpQuery::newDocument($page);

    $ean = $document->find('.product-ean');
    $ean = $ean->getString();
    $description = $document->find('#label_tab_1');
    $description = $description->getString();
    if(empty($ean)){
        continue;
    }
    echo "
    <tr>
        <td>".$result['value'][0]['value'] ."</td>
        <td>".$ean[0]."</td>
        <td>".$description[0]."</td>
    </tr>";
}
echo "</table>"
?>



