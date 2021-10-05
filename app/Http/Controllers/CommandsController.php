<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Command;
use App\Models\Commanded_products;
use App\Models\products;
use Illuminate\Http\Request;

class CommandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        // dd($toReturnCommands[0]);

        return view('commands.commands', compact('toReturnCommands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $command = Command::find($id);
        $toReturnCommand = [];
        $commandedProducts = [];
        $prix = 0;
        foreach (Commanded_products::where('command_id', $command->id)->get() as $commandedProduct) {
            array_push($commandedProducts, $commandedProduct->products->product_name . '(' . $commandedProduct->quantity . ')');
            $prix += $commandedProduct->products->price * $commandedProduct->quantity;
        }
        array_push($toReturnCommand, $command->id, implode(',', $commandedProducts), $prix, $command->clients->firstname . ' ' . $command->clients->lastname, $command->clients->phone);
        $livreurs = admin::where('role_id', 4)->get();
        return view('commands.edit', compact('toReturnCommand', 'livreurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'deliverer_id' => 'required',
        ]);
        Command::find($id)->update(['deliverer_id' => $request->deliverer_id]);
        return redirect()->intended('staff/commands')->with('success', 'La tâche a été assigné au livreur avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
