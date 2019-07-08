<?php

use PHPUnit\Framework\TestCase;

require("/var/www/html/controllers/DefaultController.php");
require("/var/www/html/controllers/RobotController.php");

class RobotControllerTest extends TestCase
{
    protected $robot;

    // SetUp
    public function setUp() : void
    {
        $this->robot = new RobotController;
    }

    // testMoveFunction
    public function testMoveFunction()
    {        
        $_REQUEST['xAxis'] = 0;
        $_REQUEST['yAxis'] = 0;
        $_REQUEST['fAxis'] = 'North';

        $moveDate = $this->robot->move(2);

        $expected_msg = 'Hey dude! I am now at (1,0,North)';

        $this->assertEquals($moveDate['x'],1);
        $this->assertEquals($moveDate['y'],0);
        $this->assertEquals($moveDate['z'],'North');
        $this->assertEquals($moveDate['msg'],'');
    }

    // testLeftFunction
    public function testLeftFunction()
    {        
        $_REQUEST['xAxis'] = 0;
        $_REQUEST['yAxis'] = 0;
        $_REQUEST['fAxis'] = 'North';

        $moveDate = $this->robot->left(2);

        $this->assertEquals($moveDate['z'],'West');
    }    

    // testRightFunction
    public function testRightFunction()
    {        
        $_REQUEST['xAxis'] = 0;
        $_REQUEST['yAxis'] = 0;
        $_REQUEST['fAxis'] = 'North';

        $moveDate = $this->robot->right(2);

        $this->assertEquals($moveDate['z'],'East');

    }

}

