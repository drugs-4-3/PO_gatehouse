<?php

namespace App\Http\Controllers\Gatehouse;

use App\Http\Controllers\Controller;
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
        return view('gatehouse.give_key');
    }

    public function give_key_handler(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $employee_id = $request->get('employee_id');
            $key_id = $request->get('key_id');

            if (!array_key_exists($employee_id, $this->employee_container) or !array_key_exists($key_id, $this->key_container)) {
                $request->session()->flash('alert-danger', 'Bład: id pracownika lub klucza nie zgadzają się');
            }
            // sprawdzenie innych warunków, np. czy mozna wydac klucz temu pracownikowi...
            else {
                $request->session()->flash('alert-success', 'Sukces! Pomyslnie wydano klucz');
            }
            return view('gatehouse.give_key_handler');
        }
    }
}