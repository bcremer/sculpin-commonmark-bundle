<?php
namespace Bcremer\Sculpin\Bundle\CommonMarkBundle;

use League\CommonMark\CommonMarkConverter as LeagueCommonMarkConverter;
use Sculpin\Core\Converter\ConverterContextInterface;
use Sculpin\Core\Converter\ConverterInterface;

class CommonMarkConverter implements ConverterInterface
{
    /**
     * @var LeagueCommonMarkConverter
     */
    protected $converter;

    /**
     * @param LeagueCommonMarkConverter $converter Parser
     */
    public function __construct(LeagueCommonMarkConverter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * {@inheritdoc}
     */
    public function convert(ConverterContextInterface $converterContext)
    {
        $converterContext->setContent($this->converter->convertToHtml($converterContext->content()));
    }
}
