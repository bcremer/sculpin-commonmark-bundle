<?php
namespace Bcremer\Sculpin\Bundle\CommonMarkBundle\EventListener;

use Bcremer\Sculpin\Bundle\CommonMarkBundle\SculpinCommonMarkBundle;
use Sculpin\Core\Event\SourceSetEvent;
use Sculpin\Core\Source\FileSource;

class CommonMark
{
    /**
     * Extensions
     *
     * @var array
     */
    protected $extensions = [];

    /**
     * Constructor.
     *
     * @param array  $extensions Extensions
     */
    public function __construct(array $extensions = [])
    {
        $this->extensions = $extensions;
    }

    /**
     * Before run
     *
     * @param SourceSetEvent $sourceSetEvent Source Set Event
     */
    public function onSculpinCoreBeforerun(SourceSetEvent $sourceSetEvent)
    {
        /** @var FileSource $source */
        foreach ($sourceSetEvent->updatedSources() as $source) {
            foreach ($this->extensions as $extension) {
                if (fnmatch("*.{$extension}", $source->filename())) {
                    $source->data()->append('converters', SculpinCommonMarkBundle::CONVERTER_NAME);

                    break;
                }
            }
        }
    }
}
