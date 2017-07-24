<?php
namespace App\Formatter;

use App\Formatter;
use League\CommonMark;

/**
 * @inheritDoc
 */
final class Markdown extends CommonMark\CommonMarkConverter implements Formatter
{
    /**
     * @inheritDoc
     */
    public function __construct()
    {
        parent::__construct([
            'html_input' => CommonMark\Environment::HTML_INPUT_STRIP
        ]);
    }

    /**
     * @inheritDoc
     */
    public function format(string $input): string
    {
        return $this->convertToHtml($input);
    }
}
