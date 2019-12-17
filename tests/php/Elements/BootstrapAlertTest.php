<?php

namespace Syntro\SilverstripeElementalBootstrap\Tests\Elements;

use SilverStripe\Dev\SapphireTest;

use Syntro\SilverstripeElementalBootstrap\Elements\BootstrapAlert;

class BootstrapAlertTest extends SapphireTest
{
    public function testRender()
    {
        $alert = BootstrapAlert::create([
            'AlertType' => 'info',
            'Content' => 'testcontent'
        ]);
        $alertText = '
  <div class="col ">
    <div class="alert alert-info ">

    
    testcontent
  </div>

</div>
';
        $this->assertEquals($alertText, (string)$alert->forTemplate());
    }
}
