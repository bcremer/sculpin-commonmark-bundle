<?php
namespace Bcremer\Sculpin\Bundle\CommonMarkBundle;

use League\CommonMark\Converter;
use Sculpin\Core\Converter\ConverterContextInterface;
use Sculpin\Core\Converter\ConverterInterface;

class CommonMarkConverter implements ConverterInterface
{

    /**
     * @var Converter
     */
    private $converter;

    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * {@inheritdoc}
     */
    public function convert(ConverterContextInterface $converterContext): void
    {
        $converterContext->setContent(
            $this->converter->convertToHtml($converterContext->content())
        );
    }
}
