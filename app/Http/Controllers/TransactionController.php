<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function newTransaction()
    {
        $vehicles = Vehicle::all();
        $data = [
            'vehicles' => $vehicles
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
        $transaction = Transaction::where('id', $id)->first();
        if (!$transaction) {
            return redirect()->route('transaction')->with('error', 'Transaction not found');
        }

        $data = [
            'transaction' => $transaction,
        ];
        return view('detail-transaction', $data);
    }

    public function transactionPost()
    {
        $transaction = request()->post();
        $data = [
            'code' => $transaction['code'],
            'vehicle_id' => $transaction['vehicle_id'],
            'date' => $transaction['date'],
            'total' => $transaction['total'],
            'notes' => $transaction['notes'],
        ];

        $res = Transaction::create($data);
        if (!$res) {
            return redirect()->route('new-transaction');
        }
        return redirect()->route('transaction')->with('success', 'Transaction added successfully');
    }

    public function transactionUpdate()
    {
        $transaction = request()->post();
        if (!isset($transaction['id'])) {
            return redirect()->back()->with('error', 'transaction ID is missing');
        }


        $data = [
            'code' => $transaction['code'],
            'vehicle_id' => $transaction['vehicle_id'],
            'date' => $transaction['date'],
            'total' => $transaction['total'],
            'notes' => $transaction['notes'],
        ];

        $res = Transaction::where('id', $transaction['id'])->update($data);

        if (!$res) {
            return redirect()->route('edit-transaction')->with('error', 'Update failed');
        }

        return redirect()->route('transaction')->with('success', 'Transaction updated successfully');
    }
    public function transactionDelete()
    {
        $id = request()->post('id');
        $transaction = Transaction::where('id', $id)->first();
        if (!$transaction) {
            return redirect()->route('transaction')->with('error', 'Transaction not found');
        }

        $transaction->delete();

        return redirect()->route('transaction')->with('success', 'Transaction deleted successfully');
    }
}
