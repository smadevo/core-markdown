<?php
namespace App\Formatter;

use App\Formatter;
use League\CommonMark;

/**
 * Converts Markdown to HTML.
 *
 * @inheritDoc
 */
final class Markdown implements Formatter
{
    /**
     * @var CommonMark\Converter
     */
    private $converter;

    /**
     * Bootstraps an instance of itself.
     *
     * @return self
     *
     * @uses CommonMark\CommonMarkConverter
     * @uses CommonMark\Environment
     */
    public static function create(): self
    {
        return new self(new CommonMark\CommonMarkConverter([
            'html_input' => CommonMark\Environment::HTML_INPUT_STRIP
        ]));
    }

    /**
     * Constructor.
     *
     * @param CommonMark\Converter $converter
     */
    public function __construct(CommonMark\Converter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * @inheritDoc
     */
    public function format(string $input): string
    {
        return $this->converter->convertToHtml($input);
    }
}
