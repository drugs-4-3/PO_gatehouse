<?php

namespace App\Http\Controllers\Gatehouse;

use App\Employee;
use App\GivenKeys;
use App\Http\Controllers\Controller;
use App\Key;
use App\Room;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: michal
 * Date: 13.01.18
 * Time: 20:26
 */
class GatehouseController extends Controller
{

    private $employee_container = [
        1 => 'adam',
        3 => 'betam',
        4 => 'cetam',
        6 => 'detam'];
    private $key_container = [
        92 => 'kluczyk1',
        93 => 'kluczyk2',
        94 => 'kluczyk3'];

    public function index()
    {
        return view("gatehouse.index");
    }

    public function give_key(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $employee_id = $request->get('employee_id');
            $key_id = $request->get('key_id');

            if ($this->try_give_key($key_id, $employee_id)) {
                $request->session()->flash('alert-success', 'Sukces! Pomyslnie wydano klucz');
            }
            else {
                $request->session()->flash('alert-danger', 'Błąd, dane są niepoprawne');
            }
        }

        return view('gatehouse.give_key');
    }

    public function try_give_key($key_id, $employee_id) {
        $key = Key::find($key_id);
        $employee = Employee::find($employee_id);
        if ($key && $employee) {
            if ($key->isAvailable()) {
                $given_key = new GivenKeys();
                $given_key->setAttribute('key_id', $key_id);
                $given_key->setAttribute('employee_id', $employee_id);
                return $given_key->save();
            }
        }
        return false;
    }

    public function return_key(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $employee_id = $request->get('employee_id');
            $key_id = $request->get('key_id');

            if ($this->try_return_key($key_id, $employee_id)) {
                $request->session()->flash('alert-success', 'Sukces! Pomyslnie zwrocono klucz');
            } else {
                $request->session()->flash('alert-danger', 'Wystapil blad: dane nieprawidlowe.');
            }
        }

        return view('gatehouse.return_key');
    }

    public function try_return_key($key_id, $employee_id) {
        $key = Key::find($key_id);
        $employee = Employee::find($employee_id);
        if ($key && $employee) {
            if (!$key->isAvailable()) {
                $given_key = GivenKeys::where('key_id', $key_id)->where('employee_id', $employee_id)->whereNull('hand_back_time')->first();
                $given_key->setAttribute('hand_back_time', new \DateTime());
                return $given_key->save();
            }
        }
        return false;
    }

    public function new_employee(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $first_name = $request->get('first_name');
            $last_name = $request->get('last_name');
            $address = $request->get('address');
            $phone_number = $request->get('phone_number');
            $user_id = $request->get('user_id');

            $employee = new Employee();
            $employee->setAttribute('first_name', $first_name);
            $employee->setAttribute('last_name', $last_name);
            $employee->setAttribute('address', $address);
            $employee->setAttribute('phone_number', $phone_number);
            $employee->setAttribute('user_id', $user_id);
            if ($employee->save()) {
                $request->session()->flash('alert-success', 'Pomyślnie zapisano rekord do bazy!');
            } else {
                $request->session()->flash('alert-danger', 'Nie udało się zapisać rekordu do bazy');
            }
        }
        return view ('gatehouse.new_employee');
    }

    public function test()
    {
        $keys = Key::where('room_id', 1)->get();
        foreach($keys as $key) {
            var_dump($key->getAttribute('id'));
        }
        die;
    }

    public function key_status(Request $request)
    {
        if ($request->getMethod() == "POST") {
            $key_id = $request->get('key_id');

            // if model exists for given key_id
            $key = Key::where('id', $key_id);
            if ($key) {
                echo "jest taki klucz!";
            } else {
                echo "nie ma takiego klucza";
            }
        }
        return view('gatehouse.key_status');
    }


}