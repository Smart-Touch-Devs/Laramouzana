<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\Commanded_products;
use Illuminate\Support\Facades\Request;

class AccountantController extends Controller
{
    public function index() {
        $commands = Command::limit(20)
            ->get();
        $toReturnCommands = [];

        foreach ($commands as $key => $command) {
            $toReturnCommands[$key] = [];
            $deliveredCommands = [];
            $prix = 0;
            foreach (Commanded_products::where('command_id', $command->id)->get() as $commandedProduct) {
                array_push($deliveredCommands, $commandedProduct->products->product_name . '(' . $commandedProduct->quantity . ')');
                $prix += $commandedProduct->products->price * $commandedProduct->quantity;
            }
            array_push($toReturnCommands[$key], $command->id, implode(',', $deliveredCommands), $prix, $command->clients->firstname . ' ' . $command->clients->lastname, $command->clients->phone, $command->clients->email, $command->admins);
        }
        return view('layout.accountant.index', ['commands' => $toReturnCommands]);
    }

    public function deposit() {
        return view('layout.accountant.deposit');
    }

    public function withdraw() {
        return view('layout.accountant.withdraw');
    }

    public function remittance() {
        return view('layout.accountant.remittance');
    }
}
