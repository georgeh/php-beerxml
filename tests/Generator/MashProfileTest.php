<?php


namespace BeerXML\Test\Generator;


use BeerXML\Generator\MashProfile;
use BeerXML\Record\MashStep;

class MashProfileTest extends \PHPUnit_Framework_TestCase {
    /**
     * @var MashProfile
     */
    protected $generator;

    /**
     * @var \XMLWriter
     */
    protected $xml;

    /**
     * @var \BeerXML\Record\MashProfile
     */
    protected $record;

    public function testComplexRecordTypesAreSet()
    {
        $infusion = new MashStep();
        $infusion->setName('Infusion');
        $infusion->setType(MashStep::TYPE_INFUSION);
        $infusion->setStepTemp(68);
        $infusion->setStepTime(60);
        $infusion->setInfuseAmount(14);
        $this->record->addMashStep($infusion);

        $mashOut = new MashStep();
        $mashOut->setName('Mash Out');
        $infusion->setType(MashStep::TYPE_INFUSION);
        $infusion->setStepTemp(100);
        $infusion->setStepTime(10);
        $infusion->setInfuseAmount(4);
        $this->record->addMashStep($mashOut);

        $this->generator->build();
        $xml = $this->xml->outputMemory(true);

        $this->assertTag(array(
                'tag' => 'MASH_STEPS',
                'children' => array(
                    'count' => 2,
                    'only'  => array('tag' => 'MASH_STEP'),
                ),
            ), $xml, '', false);
    }

    protected function setUp()
    {
        $this->generator = new MashProfile();
        $this->xml = new \XMLWriter();
        $this->xml->openMemory();
        $this->generator->setXmlWriter($this->xml);
        $this->record = new \BeerXML\Record\MashProfile();
        $this->generator->setRecord($this->record);
        parent::setUp();
    }


}
