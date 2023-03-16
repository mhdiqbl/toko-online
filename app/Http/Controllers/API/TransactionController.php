<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        // validate request data
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // retrieve product price from database
        $productPrice = Product::find($validatedData['product_id'])->price;

        // calculate payment amount based on quantity and price
        $paymentAmount = $validatedData['quantity'] * $productPrice;

        // make API call to get reference no
        $response = Http::withHeaders([
            'X-API-KEY' => 'DATAUTAMA',
        ])->post('https://pay.saebo.id/test-dau/api/v1/transactions', [
            'quantity' => $validatedData['quantity'],
            'price' => $productPrice,
            'payment_amount' => $paymentAmount,
        ]);

        if ($response['code'] == 20000) {
            // create new transaction in database
            Transaction::create([
                'product_id' => $validatedData['product_id'],
                'quantity' => $validatedData['quantity'],
                'price' => $productPrice,
                'payment_amount' => $paymentAmount,
                'reference_no' => $response['data']['reference_no'],
            ]);

            return response()->json(['message' => 'Transaction created successfully']);
        } else {
            return response()->json(['error' => 'Failed to get reference no'], 500);
        }
    }
}
