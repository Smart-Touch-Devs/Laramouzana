<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Database\Eloquent\Collection;
use App\Models\clients;
use App\Models\Commanded_products;
use App\Models\products;
use App\Models\rejectedWithdraws;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    protected $saleProductsNumber;
    protected $clientsNumber;
    protected $availableProductsNumber;
    protected $newCommandsNumber;
    protected $currentMonthIncoming;
    protected $lastMonthIncoming;

    public function index()
    {
        $clients = clients::all();
        $allProducts = products::all();
        $commandedProducts = Commanded_products::all();
        $currentMonthIncomingProducts = Commanded_products::where('created_at', '<', date('Y-m-d', strtotime(date('Y') . '-' . (int) date('m') + 1 . '-01')))
            ->where('created_at', '>', date('Y-m-d', strtotime(date('Y') . '-' . (int) date('m') - 1 . '-' . date('t', strtotime(date('Y') . '-' . (int) date('m') - 1 . '-01')))))
            ->get();

        $lastMonthIncomingProducts = Commanded_products::where('created_at', '>=', date('Y-m-d', strtotime(date('Y') . '-' . (int) date('m') - 1 . '-01')))
            ->where('created_at', '<=', date('Y-m-d', strtotime(date('Y') . '-' . (int) date('m') - 1 . '-' . date('t', strtotime(date('Y') . '-' . (int) date('m') - 1 . '-01')))))
            ->get();

        $saledProducts = Commanded_products::orderBy('quantity', 'DESC')->limit(10)->get();
        $orderDescProducts = products::orderBy('stock', 'ASC')->limit(10)->get();
        //dd($orderDescProducts);

        // $weekIncomingProducts = Commanded_products::where('created_at', 'BETWEEN', date('Y-m-d', strtotime('this week')), 'AND', date('Y-m-d', strtotime(date('Y-m', strtotime('this week')) . '-' . (int) date('d', strtotime('this week')) + 6)));

        //dd($weekIncomingProducts);
        //Calling setters for data assignment

        $this->setClientsNumber($clients);
        $this->setAvailableProductsNumber($allProducts);
        $this->setSaleProductsNumber($commandedProducts);
        $this->setNewCommandsNumber($commandedProducts);
        $this->setCurrentMonthIncoming($currentMonthIncomingProducts);
        $this->setLastMonthIncoming($lastMonthIncomingProducts);


        // dd($this->getLastMonthIncoming());

        return view('layout.adminBoard', [
            'clientsNumber' => $this->getClientsNumber(),
            'availableProductsNumber' => $this->getAvailableProductsNumber(),
            'saleProductsNumber' => $this->getSaleProductsNumber(),
            'newCommandsNumber' => $this->getNewCommandsNumber(),
            'currentMonthIncoming' => $this->getCurrentMonthIncoming(),
            'lastMonthIncoming' => $this->getLastMonthIncoming(),
            'mostSaledProducts' => $saledProducts,
            'orderDescProducts' => $orderDescProducts
        ]);
    }

    public function lineChartData()
    {
        $data = [];
        for ($m = 1; $m <= 12; $m++) {
            $TotalAmount = 0;
            $year = date('Y');
            $commandedProducts = DB::select('select c.*, p.price from commanded_products c inner join products p on c.product_id = p.id where c.created_at <= ? and MONTH(c.created_at) = ?', [$year . '-' . $m . '-' . date('t', strtotime($year . '-' . $m . '-01')), $m]);

            if (count($commandedProducts) === 0) array_push($data, 0);
            else {
                foreach ($commandedProducts as $commandedProduct) {
                    $TotalAmount += $commandedProduct->quantity * $commandedProduct->price;
                }
                array_push($data, $TotalAmount);
            }
        }

        return $data;
    }


    //Setters

    public function setSaleProductsNumber(Collection $commandedProducts)
    {
        $products = $this->extractArrayFrom($commandedProducts);

        $saleProducts = array_reduce($products, function ($previous, $next) {
            $previous += $next->quantity;
            return $previous;
        });

        $this->saleProductsNumber = $saleProducts;
    }

    public function setClientsNumber(Collection $clients)
    {
        $this->clientsNumber = count($clients);
    }

    public function setAvailableProductsNumber(Collection $allProducts)
    {
        $products = $this->extractArrayFrom($allProducts);

        $availableProducts = array_reduce($products, function ($previous, $next) {
            $previous += $next->stock;
            return $previous;
        });

        $this->availableProductsNumber = $availableProducts;
    }

    public function setNewCommandsNumber(Collection $commands)
    {
        $commands = $this->extractArrayFrom($commands);
        $resultedCommands = array_filter($commands, function ($command) {
            if ($command->is_delivered) return true;
            else return false;
        });

        $this->newCommandsNumber = count($resultedCommands);
    }

    public function setCurrentMonthIncoming(Collection $commandedProducts)
    {
        $TotalAmount = 0;
        $products = $this->extractArrayFrom($commandedProducts);
        foreach ($products as $commandedProduct) {
            $TotalAmount += ($commandedProduct->quantity * $commandedProduct->products->price);
        }

        $this->currentMonthIncoming = $TotalAmount;
    }

    public function setLastMonthIncoming(Collection $commandedProducts)
    {
        $TotalAmount = 0;
        foreach ($commandedProducts as $commandedProduct) {
            $TotalAmount += $commandedProduct->quantity * $commandedProduct->products->price;
        }

        $this->lastMonthIncoming = $TotalAmount;
    }


    //Getters

    public function getSaleProductsNumber(): int|null
    {
        return $this->saleProductsNumber;
    }

    public function getClientsNumber(): int|null
    {
        return $this->clientsNumber;
    }

    public function getAvailableProductsNumber(): int|null
    {
        return $this->availableProductsNumber;
    }

    public function getNewCommandsNumber(): int|null
    {
        return $this->newCommandsNumber;
    }

    public function getCurrentMonthIncoming(): int|null {
        return $this->currentMonthIncoming;
    }

    public function getLastMonthIncoming(): int|null {
        return $this->lastMonthIncoming;
    }

    //Extract method

    public function extractArrayFrom(Collection $collection): array
    {
        $array = [];

        foreach ($collection as $obj) {
            array_push($array, $obj);
        }

        return $array;
    }

    public function adminChangePwIndex()
    {
        return view('layout.changePw');
    }

    public function changePw(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'id' => 'required'
        ]);

        admin::find($request->id)->update(['password' => Hash::make($request->password)]);

        return redirect()->intended('/staff')->with('success', 'Mot de passe changé avec succès!');
    }

    public function withdrawRequests() {
        $withdrawRequests = Withdraw::where('done', false)->get();
        return view('layout.withdraw_requests', ['withdrawRequests' => $withdrawRequests]);
    }

    public function validateWithdraw() {
        $withdrawal = Withdraw::find(request('id'));
        $withdrawal->update(['done' => true]);
        
        return redirect()->back()->with('success', 'Le rétrait a été validé avec succès!');
    }

    public function rejectWithdraw($id) {
        $rejectedWithdrawal = Withdraw::find($id);
        rejectedWithdraws::create([
            'client_id' => $rejectedWithdrawal->client_id,
            'amount' => $rejectedWithdrawal->amount,
            'created_at' => $rejectedWithdrawal->created_at,
            'updated_at' => now()
        ]);
        $rejectedWithdrawal->delete();
        return redirect()->back()->with('success', 'Vous aviez rejété le rétrait!');
    }
}
