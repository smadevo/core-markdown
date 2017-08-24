<?php
namespace Smadevo\Formatter;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Converter;
use League\CommonMark\Environment;

/**
 * Converts Markdown to HTML.
 *
 * @inheritDoc
 */
abstract class Markdown implements \Smadevo\Formatter
{
    /**
     * @var Converter
     */
    private $converter;

    /**
     * Creates and returns a Markdown formatter.
     *
     * @return self
     *
     * @uses CommonMarkConverter
     * @uses Environment
     */
    final public static function create(): self
    {
        return new static(new CommonMarkConverter([
            'html_input' => Environment::HTML_INPUT_STRIP
        ]));
    }

    /**
     * Constructor.
     *
     * @param Converter $converter
     */
    final public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * @inheritDoc
     */
    final public function format(string $input): string
    {
        return $this->converter->convertToHtml($input);
    }
}
