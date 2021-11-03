<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\Commanded_products;
use Illuminate\Support\Facades\Auth;

class DelivererController extends Controller
{
    public function index()
    {
        $commands = Command::where(['is_delivered' => 0, 'deliverer_id' => Auth::guard('admin')->user()->id])->get();
        $toReturnCommands = [];

        foreach ($commands as $key => $command) {
            $toReturnCommands[$key] = [];
            $commandedProducts = [];
            $prix = 0;
            foreach (Commanded_products::where('command_id', $command
                ->id)
                ->get() as $commandedProduct) {
                array_push($commandedProducts, $commandedProduct->products->product_name . '(' . $commandedProduct->quantity . ')');
                $prix += $commandedProduct
                    ->products
                    ->price * $commandedProduct->quantity;
            }
            array_push($toReturnCommands[$key], $command->id, implode(',', $commandedProducts), $prix, $command
                ->clients
                ->firstname . ' ' . $command
                ->clients
                ->lastname, $command
                ->clients
                ->phone, $command
                ->clients
                ->email, $command
                ->admins);
        }

        return view('layout.deliverer.index', ['commands' => $toReturnCommands]);
    }

    public function history()
    {
        $commands = Command::where('is_delivered', 1)
            ->orderBy('created_at', 'desc')
            ->limit(20)
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
        return view('layout.deliverer.history', ['commands' => $toReturnCommands]);
    }

    public function update($id)
    {
        Command::where('id', $id)
            ->update(['is_delivered' => 1]);
        return redirect()
            ->back()
            ->with('success', 'Status de la commande changé avec succès!');
    }
    public function delivered_product()
    {
        $commands = Command::where('is_delivered', 0)->get();
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
        return view('/staff/delivered_product',compact('toReturnCommands'));
    }
}
