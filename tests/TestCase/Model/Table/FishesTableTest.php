<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FishesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FishesTable Test Case
 */
class FishesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FishesTable
     */
    public $Fishes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fishes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fishes') ? [] : ['className' => FishesTable::class];
        $this->Fishes = TableRegistry::get('Fishes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fishes);

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
