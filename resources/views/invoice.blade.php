<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .invoice-container {
            width: 500px;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-header h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .invoice-header p {
            margin: 5px 0;
            font-size: 14px;
            color: #777;
        }

        .invoice-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .invoice-info div {
            font-size: 14px;
            color: #555;
        }

        .invoice-info .date {
            text-align: right;
        }

        .invoice-items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-items th,
        .invoice-items td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .invoice-items th {
            background-color: #f9f9f9;
        }

        .total {
            font-size: 18px;
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
        }

        .note-footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="invoice-container">
        <div class="invoice-header">
            <h2>Nota Pembelian</h2>
            <p>Terima kasih telah berbelanja di Toko Kami!</p>
        </div>

        <div class="invoice-info">
            <div>
                <strong>Nama Pembeli:</strong><br>
                John Doe
            </div>
            <div class="date">
                <strong>Tanggal:</strong><br>
                25 Desember 2024
            </div>
        </div>

        <table class="invoice-items">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Produk A</td>
                    <td>Rp 50,000</td>
                    <td>2</td>
                    <td>Rp 100,000</td>
                </tr>
                <tr>
                    <td>Produk B</td>
                    <td>Rp 30,000</td>
                    <td>1</td>
                    <td>Rp 30,000</td>
                </tr>
                <tr>
                    <td>Produk C</td>
                    <td>Rp 20,000</td>
                    <td>3</td>
                    <td>Rp 60,000</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            <strong>Total: Rp 190,000</strong>
        </div>

        <div class="note-footer">
            <p>Terima kasih atas transaksi Anda.</p>
            <p>Harap simpan nota ini sebagai bukti pembelian.</p>
        </div>
    </div>

</body>

</html>
