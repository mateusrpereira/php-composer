<?php
require 'vendor/autoload.php';

//Guzzle: realizar requisições HTTP
use GuzzleHttp\Client;

//DomCrowler: ler o HTML
use Symfony\Component\DomCrawler\Crawler;

//Guzzle
$client = new Client();
$resposta = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');
$html = $resposta->getBody();

//DomCrowler
//$crawler = new Crawler();
$crawler = new Crawler($html);
//$crawler->addHtmlContent($html);
$cursos = $crawler->filter('span.card-curso__nome');

foreach ($cursos as $curso) {
    echo $curso->textContent . PHP_EOL;
}

