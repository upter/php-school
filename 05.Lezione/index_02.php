<?php

require __DIR__ . '/app/bootstrap_sample_01.php';
use Symfony\Component\HttpFoundation\Response;

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$welcome = new Page();
$welcome->setTitle('Benvenuti!!!');
$welcome->setDescription('questa è la pagina di benvenuto');

$about = new Page();
$about->setTitle('Chi Siamo?');
$about->setDescription('SVILUPPATORI!!!');

$pages = [
	'welcome' => $welcome,
	'about-us' => $about
];


$app->get('/', function($page = 'welcome') use ($pages) {
	
    $mainPage = $pages[$page];
    $html = new HtmlExample($mainPage);
		
    return new Response($html->getOutput(), $mainPage->getCode());

})->bind('homepage');


$app->get('/{page}', function($page) use ($pages) {
    
    $mainPage = $pages[$page];
    $html = new HtmlExample($mainPage);
		
    return new Response($html->getOutput(), $mainPage->getCode());
    
})->bind('all_pages');

class Page {

    protected $title;
    protected $description;
    protected $code_status;

    public function __construct() {
        $this->code_status = 404;
    }

    // CODE_STATUS SETTER & GETTER
    public function setCode($value) {
        return $this->code_status = (int) $value;
    }

    public function getCode() {
        return $this->code_status;
    }

    // TITLE SETTER & GETTER
    public function setTitle($title) {
        if ($this->getCode() == 404) {
            $this->setCode(200);
        }
        return $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    // DESCRIPTION SETTER & GETTER
    public function setDescription($description) {
        if ($this->getCode() == 404) {
            $this->setCode(200);
        }
        return $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }

}

class HtmlExample {

    protected $html = '
		<html>
			<head>
				<title>{{ title }} - {{ description }}</title>
			</head>
			<body>
				<h1>{{ title }}</h1>
				<p>{{ description }}</p>
			</body>
		</html>
		';
    protected $output;

    public function __construct(Page $page) {
        if ($page instanceof Page) {
            $this->output = str_replace('{{ title }}', $page->getTitle(), $this->html);
            $this->output = str_replace('{{ description }}', $page->getDescription(), $this->output);
        }
    }

    public function getOutput() {
        return $this->output;
    }

}


$app->run();
