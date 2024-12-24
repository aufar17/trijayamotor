<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\TransactionInventory;
use App\Models\TransactionService;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function newTransaction()
    {
        $vehicles = Vehicle::get();
        $inventories = Inventory::get();
        $services = Service::get();
        $data = [
            'vehicles' => $vehicles,
            'inventories' => $inventories,
            'services' => $services,
        ];
        return view('new-transaction', $data);
    }

    public function editTransaction($id)
    {
        $transaction = Transaction::with('vehicle')->where('id', $id)->first();

        if (!$transaction) {
            return redirect()->route('transaction')->with('error', 'Transaction not found');
        }

        $vehicles = Vehicle::all();

        $data = [
            'transaction' => $transaction,
            'vehicles' => $vehicles,
        ];

        return view('edit-transaction', $data);
    }


    public function detailTransaction($id)
    {
        $transactions = Transaction::with(['vehicle','transactionInventory','transactionInventory.inventory','transactionService','transactionService.service'])->where('id', $id)->first();
        if (!$transactions) {
            return redirect()->route('transaction')->with('error', 'No supply history');
        }

       


        $data = [
            'transactions' => $transactions,
        ];
        return view('detail-transaction', $data);
    }

    public function transactionPost()
    {
        $params = request()->post();
        try {
            DB::beginTransaction();
            $vehicles = Vehicle::where('id', $params['vehicle_id'])->first();
            if (!$vehicles) {
                return redirect()->route('transaction')->with('error', 'Data vehicles dengan ID ' . $params['vehicle_id'] . ' tidak ditemukan');
            }
            $jumlahHargaInventory = 0;
            if ($params['inventory_id'] ?? null) {
                $arrQtyBarang = [];
                foreach (($params['inventory_id'] ?? []) as $i => $r) {
                    $arrQtyBarang[$r] = $params['qty'][$i];
                }
                $arrInventory = Inventory::whereIn('id', $params['inventory_id'])->get();
                foreach ($arrInventory ?? [] as $r) {
                    $stock = $r->stock;
                    $stock -= $arrQtyBarang[$r->id];
                    $r->stock = $stock;
                    if ($r->stock < 0) $r->stock = 0;
                    $r->save();
                    $jumlahHargaInventory += $arrQtyBarang[$r->id] * $r->sell;
                }
            }
            
            $jumlahHargaJasa = 0;
            if ($params['service_id'] ?? null) {
                $arrService = Service::whereIn('id', $params['service_id'])->get();
                foreach ($arrService ?? [] as $r) {
                    $jumlahHargaJasa += $r->price;
                }
            }

            $total = $jumlahHargaInventory + $jumlahHargaJasa;

            $dataTransaksi = [
                'code' => $params['code'],
                'vehicle_id' => $params['vehicle_id'],
                'date' => $params['date'],
                'total' => $total,
                'total_spareparts' => $jumlahHargaInventory,
                'total_services' => $jumlahHargaJasa,
                'notes' =>  $params['notes'],
            ];

            $transaksi = new Transaction($dataTransaksi);
            $transaksi->save();

            if (!empty($arrInventory)) {
                foreach ($arrInventory as $r) {
                    ($dataTransactionInventory  = [
                        'inventory_id' => $r['id'],
                        'qty' => $arrQtyBarang[$r->id],
                        'transaction_id' => $transaksi['id'],
                    ]);

                    $transactionInventory = new TransactionInventory($dataTransactionInventory);
                    $transactionInventory->save();
                }
            }

            if (!empty($arrService)) {
                foreach ($arrService as $r) {
                    ($dataTransactionService  = [
                        'service_id' => $r['id'],
                        'transaction_id' => $transaksi['id'],
                    ]);

                    $transactionService = new TransactionService($dataTransactionService);
                    $transactionService->save();
                }
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect('new-transaction')->with('error','Cannot make transaction');
        }

        return redirect('transaction')->with('success', 'Transaction created successfully');
    }

    
}
