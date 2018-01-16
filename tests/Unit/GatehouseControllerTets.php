<?php
/**
 * Created by PhpStorm.
 * User: michal
 * Date: 16.01.18
 * Time: 06:35
 */

namespace Tests\Unit;


use App\Employee;
use App\Http\Controllers\Gatehouse\GatehouseController;
use Illuminate\Auth\Access\Gate;
use Tests\TestCase;

class GatehouseControllerTets extends TestCase
{

    public function testNoSuchEmployee()
    {
        $employee = Employee::where('first_name', 'PrzypadekTestowy')->first();
        $this->assertNull($employee, 'No such employee with given name should exist!');
    }

    public function testEmployeeExist()
    {
        $employee = Employee::where('first_name', 'Waclaw')->first();
        $this->assertNotNull($employee, 'There should be an employee with this name');
    }

    public function testGivingKeyWorks()
    {
        $key_id = 1;
        $employee_id = 1;
        $controller = new GatehouseController();

        $this->assertTrue($controller->try_give_key($key_id, $employee_id));
    }

    /**
     * @depends testGivingKeyWorks
     */
    public function testGivingKeyIsImpossible()
    {
        $key_id = 1;
        $employee_id = 1;
        $controller = new GatehouseController();

        $this->assertFalse($controller->try_give_key($key_id, $employee_id));
    }

    /**
     * @depends testGivingKeyIsImpossible
     */
    public function testReturningKeyWorks()
    {
        $key_id = 1;
        $employee_id = 1;
        $controller = new GatehouseController();

        $this->assertTrue($controller->try_return_key($key_id, $employee_id));
    }

}