<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\Bautismos2Table;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Bautismos2Table Test Case
 */
class Bautismos2TableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\Bautismos2Table
     */
    public $Bautismos2;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bautismos2'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bautismos2') ? [] : ['className' => 'App\Model\Table\Bautismos2Table'];
        $this->Bautismos2 = TableRegistry::get('Bautismos2', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bautismos2);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
