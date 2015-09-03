<?php
namespace Bcremer\Sculpin\Bundle\CommonMarkBundle;

use League\CommonMark\DocParser;
use League\CommonMark\ElementRendererInterface;
use Sculpin\Core\Converter\ConverterContextInterface;
use Sculpin\Core\Converter\ConverterInterface;

class CommonMarkConverter implements ConverterInterface
{
    /**
     * @var DocParser
     */
    private $parser;

    /**
     * @var HtmlRendererInterface
     */
    private $renderer;

    /**
     * @param DocParser             $parser
     * @param HtmlRendererInterface $renderer
     */
    public function __construct(DocParser $parser, ElementRendererInterface $renderer)
    {
        $this->parser = $parser;
        $this->renderer = $renderer;
    }

    /**
     * {@inheritdoc}
     */
    public function convert(ConverterContextInterface $converterContext)
    {
        $documentAST = $this->parser->parse($converterContext->content());

        $converterContext->setContent(
            $this->renderer->renderBlock($documentAST)
        );
    }
}
