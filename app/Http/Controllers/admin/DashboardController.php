<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;

class DashboardController extends Controller
{
    public function index() {
        return view('admin.dashboard.index');
    }

    public function dashboard(){
        $dataForm = request()->all();
        switch ($dataForm['dataForm']) {
            case 'Today':
                $start = date("Y-m-d");
                $end = date("Y-m-d", strtotime("tomorrow"));
                $active = 'today';
                break;
            case 'Monthly':
                $start = date('Y-m-01');
                $end = date('Y-m-t');
                $active = 'month';
                break;
            case 'Weekly':
                $start = date("Y-m-d", strtotime("this week"));
                $end = date("Y-m-d", strtotime("+6 days", strtotime($start)));
                $active = 'week';
                break;
            case 'date':
                $date = explode(' - ', str_replace(',', '', $dataForm['calendar']));
                $start = date('Y-m-d', strtotime($date[0]));
                $end = date('Y-m-d', strtotime($date[1]));
                $active = 'date';
                break;
            default:
                $start = date('Y-m-01');
                $end = date('Y-m-t');
                $active = 'month';
        }
        $calendar = date('d', strtotime($start)).' '.date('M', strtotime($start)).', '.date('Y', strtotime($start)).' - '.date('d', strtotime($end)).' '.date('M', strtotime($end)).', '.date('Y', strtotime($end));
        $sales = Sale::whereBetween('created_at', [$start, $end])->get();
        $client = [];
        $debts = 0;
        $cost = 0;
        $productSold = 0;
        $paid = 0;

        if(count($sales) !== 0){
            foreach ($sales as $sale){
                foreach ($sale->products as $sold){
                    $cost += $sold['count'] * $sold['cost'];
                    $productSold += $sold['count'];
                }
                if(!array_key_exists($sale['client_id'], $client)){
                    $client[$sale['client_id']]['id'] = $sale['client_id'];
                    $client[$sale['client_id']]['name'] = $sale->client->name;
                    $client[$sale['client_id']]['address'] = $sale->client->address;
                    $client[$sale['client_id']]['overall_amount'] = $sale['amount'];
                    $client[$sale['client_id']]['overall_debt'] = $sale['debt'];
                } else{
                    $client[$sale['client_id']]['overall_amount'] += $sale['amount'];
                    $client[$sale['client_id']]['overall_debt'] += $sale['debt'];
                }
                $debts += $sale['debt'];
            }
            $paid = $sales->pluck('amount')->sum() - $debts;
            $activeClients = count($client);
            $profit = $sales->pluck('amount')->sum() - $cost;
            $profitPercentage = 100 - ($cost / $sales->pluck('amount')->sum() * 100);
            $profitPercentage = number_format($profitPercentage, 1);
            $profit = number_format($profit, 0, '.', ' ');
        } else{
            $profit = 0;
            $profitPercentage = 0;
            $activeClients = 0;
        }
        $data['salesTotal'] = number_format($sales->pluck('amount')->sum(), 0, '.', ' ');
        $data['clients'] = '';
        foreach ($client as $clien){
            $data['clients'] .= view('admin.dashboard.clients', compact('sales', 'clien'));
        }
        $data['dashboardPart'] = '';
        $data['dashboardPart'] .= view('admin.dashboard.dashboardPart', compact('paid', 'profit', 'profitPercentage', 'activeClients', 'productSold', 'cost', 'debts'));
        $data['calendar'] = $calendar;
        return $data;
    }
}
