<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

//  Получить количество книг одного автора с фамилией Иванов, напечатанных в издательстве Издательство 1
$cnt = \Test\BookTable::GetList([
    'select' => ['*', "PUBLISH_TITLE" => "PUBLISH.TITLE", 'AUTHOR_' => 'AUTHORS'],
    'filter' => ["AUTHORS.LAST_NAME" => "Иванов", "PUBLISH.TITLE" => "Издательство 1"],
    'count_total' => true
])->getCount();

echo 'количество книг одного автора с фамилией Иванов, напечатанных в издательстве Издательство 1 = <b>' . $cnt . '</b><br>';

//Получить гонорар соавторов A и B книги С за полный тираж
$arResult = [];
$res = \Test\BookTable::GetList([
    'filter' => ["TITLE" => 'Книга 3'],
    'select' => ["COPIES_CNT", "AUTHOR" => "AUTHORS.ID", "PROFIT" => "PUBLISH.AUTHOR_PROFIT"],
]);
while($arRes = $res->fetch()){
    $arResult['COPIES_CNT'] = $arRes['COPIES_CNT'];
    $arResult['PROFIT'] = $arRes['PROFIT'];
    $arResult['AUTHORS_CNT'] ++;
}

echo 'гонорар за книгу "Книга 3" для каждого автора = ' . ($arResult['COPIES_CNT'] * $arResult['PROFIT'] / $arResult['AUTHORS_CNT']);
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';?>
