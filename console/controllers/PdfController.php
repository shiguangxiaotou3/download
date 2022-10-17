<?php


namespace console\controllers;


use yii\console\Controller;
use Smalot\PdfParser\Parser;
/**
 * C
 * @package console\controllers
 */
class PdfController extends Controller
{

    public function actionIndex(){
        ini_set('memory_limit',-1);
        $parser = new Parser();
        $pdf = $parser->parseFile('./a.pdf');

        $text = $pdf->getText();
        echo $text;
    }
}