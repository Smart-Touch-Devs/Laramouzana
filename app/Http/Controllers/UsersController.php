<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\City;
use App\Models\clients;
use App\Models\Country;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function index($id = null)
    {
        //Get clients and technicians
        $clients = DB::table('clients')
            ->select([
                'id',
                'firstname',
                'lastname',
                'email',
                'birthday',
                'phone',
            ])
            ->where('role', '=', '1')
            ->get();

        $technicians = DB::table('clients')
            ->select([
                'id',
                'firstname',
                'lastname',
                'email',
                'birthday',
                'phone',
            ])
            ->where('role', '=', '2')
            ->get();

        $deliverer = DB::table('admins')
            ->select(['id', 'first_name', 'last_name', 'email', 'birthday', 'phone'])
            ->where('role_id', '=', '4')
            ->get();

        $accountant = DB::table('admins')
            ->select(['id', 'first_name', 'last_name', 'email', 'birthday', 'phone'])
            ->where('role_id', '=', '3')
            ->get();

        //Get Countries and Cities

        $countries = Country::all(['id', 'countryName', 'indicative']);
        $cities = City::all(['cityName', 'belongedCountry']);

        //return to view
        switch ($id) {
            case 'clients':
                return view('users.clients', [
                    'clients' => $clients,
                    'userRole' => 1,
                    'lisTitle' => "Liste des clients",
                    'formTitle' => "Ajouter un client",
                    'countries' => $countries,
                    'cities' => $cities
                ]);
                break;

            case 'technicians':
                return view('users.clients', [
                    'clients' => $technicians,
                    'userRole' => 2,
                    'lisTitle' => "Liste des techniciens",
                    'formTitle' => "Ajouter un technicien",
                    'countries' => $countries,
                    'cities' => $cities
                ]);
                break;
            case 'deliverers':
                return view('users.otherStaffMember', [
                    'staffMembers' => $deliverer,
                    'userRole' => 4,
                    'lisTitle' => "Liste des livreurs",
                    'formTitle' => "Ajouter un livreur",
                    'countries' => $countries,
                    'cities' => $cities
                ]);
                break;
            case 'accountants':
                return view('users.otherStaffMember', [
                    'staffMembers' => $accountant,
                    'userRole' => 3,
                    'lisTitle' => "Liste des comptables",
                    'formTitle' => "Ajouter un comptable",
                    'countries' => $countries,
                    'cities' => $cities
                ]);
                break;
            case null:
                return view('pages.error-page');
                break;
            default:
                return view('pages.error-page');
                break;
        }
    }
    //Client

    public function addClient(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'role' => 'required',
            'email' => 'email|required|same:confirm_email|unique:clients,email',
            'confirm_email' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $country = DB::table('countries')
            ->select('id')
            ->where('countryName', '=', $request->country)
            ->get();

        $city = DB::table('cities')
            ->select('id')
            ->where('cityName', '=', $request->city)
            ->get();

        clients::create([
            'role' => $request->role,
            'country' => $country[0]->id,
            'city' => $city[0]->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'affiliate_code' => "Test20",
            'birthday' => new DateTime($request->birthday),
            'phone' => $request->phone,
            'sup_code' => $request->sup_code || null,
            'password' => Hash::make($request->password)
        ]);
        $userType = $request->role === 1 ? 'Client' : 'Technicien';
        $request->session()->put('success', $userType . ' ajouté avec succès!');
        return redirect()->back(302);
    }

    //Staff

    public function addStaff(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'role' => 'required',
            'email' => 'email|required|same:confirm_email|unique:admins,email',
            'confirm_email' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $country = DB::table('countries')
            ->select('id')
            ->where('countryName', '=', $request->country)
            ->get();

        $city = DB::table('cities')
            ->select('id')
            ->where('cityName', '=', $request->city)
            ->get();


        admin::create([
            'role_id' => $request->role,
            'country' => $country[0]->id,
            'city' => $city[0]->id,
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'birthday' => new DateTime($request->birthday),
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        $userType = $request->role === 3 ? 'Comptable' : 'Livreur';
        $request->session()->put('success', $userType . ' ajouté avec succès!');
        return redirect()->back(302);
    }


    public function deleteClient($id)
    {
        if (clients::find($id)->delete()) {
            Session::put('deleteSucessful', 'La suppression a été un succès!');
            return redirect()->back(302);
        }
    }

    public function deleteStaff($id)
    {
        if (admin::find($id)->delete()) {
            Session::put('deleteSucessful', 'La suppression a été un succès!');
            return redirect()->back(302);
        }
    }

    public function showClient($id)
    {
        $clientDetails = DB::table('clients')
            ->select([
                'lastname',
                'firstname',
                'birthday',
                'email',
                'phone',
                'cnib',
                'countryName',
                'cityName',
                'affiliate_code',
                'sup_code'
            ])
            ->join('countries', 'clients.country', '=', 'countries.id')
            ->join('cities', 'clients.city', '=', 'cities.id')
            ->where('clients.id', '=', $id)
            ->get()[0];

            $returnData = [
                'Nom' => $clientDetails->lastname,
                'Prénom' => $clientDetails->firstname,
                'Date de naissance' => date('d/M/Y', strtotime($clientDetails->birthday)),
                'Addresse email' => $clientDetails->email,
                'Téléphone' => $clientDetails->phone,
                'CNIB' => $clientDetails->cnib,
                'Pays' => $clientDetails->countryName,
                'Ville' => $clientDetails->cityName,
                'Code de parrainnage' => $clientDetails->affiliate_code,
                'Parrain' =>$clientDetails->sup_code
            ];

            return $returnData;
    }

    public function showStaff($id)
    {
        $staffDetails = DB::table('admins')
            ->select([
                'last_name',
                'first_name',
                'birthday',
                'email',
                'phone',
                'countryName',
                'cityName',
            ])
            ->join('countries', 'admins.country', '=', 'countries.id')
            ->join('cities', 'admins.city', '=', 'cities.id')
            ->where('admins.id', '=', $id)
            ->get()[0];

        $returnData = [
            'Nom' => $staffDetails->last_name,
                'Prénom' => $staffDetails->first_name,
                'Date de naissance' => date('d/M/Y', strtotime($staffDetails->birthday)),
                'Addresse email' => $staffDetails->email,
                'Téléphone' => $staffDetails->phone,
                'Pays' => $staffDetails->countryName,
                'Ville' => $staffDetails->cityName
        ];

        return $returnData;
    }
}
