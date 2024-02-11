<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class Hr extends Element
{
    public function __construct(string $id)
    {
        parent::__construct('hr');
        $this->setId($id);
    }

    public function getContent(): string
    {
        return '';
    }
}