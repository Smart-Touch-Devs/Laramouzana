<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use App\Models\clients;
use App\Models\Commanded_products;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        ->where('created_at', '>', date('Y-m-d', strtotime(date('Y') . '-' . (int) date('m') -1 . '-' . date('t', strtotime(date('Y') . '-' . (int) date('m') -1 . '-01')))))
        ->get();

        $lastMonthIncomingProducts = Commanded_products::where('created_at', '>=', date('Y-m-d', strtotime(date('Y') . '-' . (int) date('m') - 1 . '-01')))
        ->where('created_at', '<=', date('Y-m-d', strtotime(date('Y') . '-' . (int) date('m') -1 . '-' . date('t', strtotime(date('Y') . '-' . (int) date('m') -1 . '-01')))))
        ->get();


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
            'lastMonthIncoming' => $this->getLastMonthIncoming()
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

    public function pieChartData() {
        $data = [];
        $weekIncomingProducts = DB::select('select c.*, p.price from commanded_products c inner join products p where c.created_at between ? and ? and c.product_id = p.id', [date('Y-m-d', strtotime('this week')), date('Y-m-d', strtotime(date('Y-m', strtotime('this week')) . '-' . (int) date('d', strtotime('this week')) + 6))]);


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

    public function setCurrentMonthIncoming(Collection $commandedProducts) {
        $TotalAmount = 0;
        $products = $this->extractArrayFrom($commandedProducts);
        foreach ($products as $commandedProduct) {
            $TotalAmount += ($commandedProduct->quantity * $commandedProduct->products->price);
        }

        $this->currentMonthIncoming = $TotalAmount;
    }

    public function setLastMonthIncoming(Collection $commandedProducts) {
        $TotalAmount = 0;
        foreach ($commandedProducts as $commandedProduct) {
            $TotalAmount += $commandedProduct->quantity * $commandedProduct->products->price;
        }

        $this->lastMonthIncoming = $TotalAmount;

    }


    //Getters

    public function getSaleProductsNumber(): int
    {
        return $this->saleProductsNumber;
    }

    public function getClientsNumber(): int
    {
        return $this->clientsNumber;
    }

    public function getAvailableProductsNumber(): int
    {
        return $this->availableProductsNumber;
    }

    public function getNewCommandsNumber(): int
    {
        return $this->newCommandsNumber;
    }

    public function getCurrentMonthIncoming(): int {
        return $this->currentMonthIncoming;
    }

    public function getLastMonthIncoming(): int {
        return $this->lastMonthIncoming;
    }

    public function getWeekIncoming(): int {
        return $this->weekIncoming;
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
}
