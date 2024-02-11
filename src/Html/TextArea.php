<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class TextArea extends Element
{
    private $content;

    public function __construct(string $id, string $content)
    {
        parent::__construct('textarea');
        $this->setId($id);
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
