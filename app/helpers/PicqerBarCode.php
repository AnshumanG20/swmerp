<?php 
require "PicqerBarCode/vendor/autoload.php";

function barCodeGen($text){
	$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
	return $Bar->getBarcode($text, $Bar::TYPE_CODE_128);
}