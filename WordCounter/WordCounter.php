<?php

namespace WordCounter;

use Generator;

class WordCounter
{
    const DELIMITERS = [' ', '.', ',', ';', ':', '-', '!', '?', '"', "'", '(', ')', '[', ']', '{', '}', '/','<', '>', '|',];

    protected array $words = [];

    public function __construct(
        protected string $string
    )
    {
    }

    public static function make(string $string): self
    {
        return new self($string);
    }

    protected function getChar(): Generator
    {
        $i = 0;
        while (isset($this->string[$i])) {
            yield $this->string[$i];
            $i++;
        }

        yield ' ';
    }

    public function count(): self
    {
        $word = '';
        foreach ($this->getChar() as $char) {
            if (in_array($char, self::DELIMITERS) && !empty($word)) {
                $this->words[$word] = ($this->words[$word] ?? 0) + 1;
                $word = '';
            } else {
                $word .= $char;
            }
        }

        return $this;
    }

    public function getWords(): array
    {
        return $this->words;
    }
}