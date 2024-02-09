<?php

use Imadepurnamayasa\PhpInti\Html\Body;
use Imadepurnamayasa\PhpInti\Html\Button;
use Imadepurnamayasa\PhpInti\Html\Form;
use Imadepurnamayasa\PhpInti\Html\Hr;
use Imadepurnamayasa\PhpInti\Html\Html;
use Imadepurnamayasa\PhpInti\Html\Input;
use Imadepurnamayasa\PhpInti\Html\P;
use Imadepurnamayasa\PhpInti\Html\Title;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';

$p1 = new P('Please insert your username and password');
$p1->setId('p1');

$username = new Input('text');
$username->setId('username');
$username->addAttribute('placeholder', 'username');

$hr1 = new Hr();
$hr1->setId('hr1');

$password = new Input('password');
$password->setId('password');
$password->addAttribute('placeholder', 'password');

$hr2 = new Hr();
$hr2->setId('hr2');

$save = new Button('button', 'Save');
$save->setId('save');
$save->addAttribute('class', 'button');

$form = new Form();
$form
    ->addElement($p1)
    ->addElement($username)
    ->addElement($hr1)
    ->addElement($password)
    ->addElement($hr2)
    ->addElement($save);

$title = new Title('Form Login');

$body = new Body();
$body->setId('body');
$body->addElement($form);

$html = new Html();
$body->setId('html');
echo $html->addElement($body)->render();