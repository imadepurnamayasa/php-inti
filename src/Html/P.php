<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class P extends Element
{
    private $content;

    public function __construct(string $content)
    {
        parent::__construct('p');
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
