<?php
namespace Cierrateam\Billing\Tests;

use Cierrateam\Billing\Models\Numrange;

class NumrangeTest extends TestCase {
    public function test_a_numrange_can_be_created()
    {
        $numrange = factory(Numrange::class)->create();

        $tn = Numrange::whereId($numrange->id)->first();
        $this->assertEquals($tn->id, $numrange->id);
    }
}