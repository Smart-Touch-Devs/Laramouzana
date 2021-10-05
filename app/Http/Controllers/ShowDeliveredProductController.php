<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\Commanded_products;
use Illuminate\Http\Request;

class ShowDeliveredProductController extends Controller
{
    public function showProductDelivered()
    {
        $commands = Command::where('is_delivered', 1)->get();
        $toReturnCommands = [];

        foreach ($commands as $key => $command) {
            $toReturnCommands[$key] = [];
            $commandedProducts = [];
            $prix = 0;
            foreach (Commanded_products::where('command_id', $command->id)->get() as $commandedProduct) {
                array_push($commandedProducts, $commandedProduct->products->product_name . '(' . $commandedProduct->quantity . ')');
                $prix += $commandedProduct->products->price * $commandedProduct->quantity;
            }
            array_push($toReturnCommands[$key], $command->id, implode(',', $commandedProducts), $prix, $command->clients->firstname . ' ' . $command->clients->lastname, $command->clients->phone, $command->admins);
        }
        // dd($toReturnCommands[0]);

        return view('commands.delivered_product', compact('toReturnCommands','commands'));

    }
}
