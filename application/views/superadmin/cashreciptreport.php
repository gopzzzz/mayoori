<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cash Receipt</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #eef1f5;
            color: #20242a;
            padding: 30px 15px;
        }

        /* Main Receipt */
        .receipt-wrapper {
            max-width: 850px;
            margin: auto;
        }

        .receipt {
            background: #ffffff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.10);
        }

        /* Header */
        .receipt-header {
            padding: 35px 40px;
            background: linear-gradient(135deg, #111827, #293548);
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 25px;
        }

        .company {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .company-logo {
            width: 65px;
            height: 65px;
            border-radius: 12px;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
        }

        .company-logo img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        .company-logo span {
            color: #111827;
            font-size: 20px;
            font-weight: 800;
        }

        .company-info h1 {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .company-info p {
            color: #cbd5e1;
            font-size: 12px;
            line-height: 1.7;
        }

        .receipt-title {
            text-align: right;
        }

        .receipt-title h2 {
            font-size: 30px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .receipt-title span {
            display: inline-block;
            margin-top: 7px;
            padding: 6px 12px;
            border-radius: 20px;
            background: rgba(255,255,255,0.12);
            font-size: 11px;
            color: #dbeafe;
        }

        /* Content */
        .receipt-content {
            padding: 35px 40px;
        }

        /* Meta */
        .meta-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .meta-box {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 15px 18px;
            background: #fafafa;
        }

        .meta-label {
            display: block;
            color: #8a919d;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .7px;
            margin-bottom: 7px;
        }

        .meta-value {
            font-size: 14px;
            font-weight: 600;
            color: #222831;
        }

        /* Customer */
        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .section-title .number {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #111827;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
        }

        .section-title h3 {
            font-size: 15px;
            font-weight: 700;
        }

        .customer-card {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 28px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .field label {
            display: block;
            font-size: 10px;
            font-weight: 700;
            color: #8a919d;
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 7px;
        }

        .field p {
            font-size: 14px;
            font-weight: 600;
        }

        /* Payment */
        .payment-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            overflow: hidden;
        }

        .payment-table th {
            background: #f5f6f8;
            color: #6b7280;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .6px;
            padding: 14px 15px;
            text-align: left;
        }

        .payment-table td {
            padding: 18px 15px;
            font-size: 13px;
            border-top: 1px solid #e5e7eb;
        }

        .payment-table td:last-child,
        .payment-table th:last-child {
            text-align: right;
        }

        .description {
            font-weight: 600;
        }

        .amount {
            font-weight: 700;
            font-size: 15px !important;
        }

        /* Total */
        .total-section {
            display: flex;
            justify-content: flex-end;
            margin-top: 25px;
        }

        .total-box {
            width: 320px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 15px;
            padding: 20px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 7px 0;
            font-size: 12px;
            color: #6b7280;
        }

        .total-row.grand-total {
            margin-top: 10px;
            padding-top: 15px;
            border-top: 1px dashed #cbd5e1;
            color: #111827;
            font-size: 20px;
            font-weight: 800;
        }

        /* Amount Words */
        .amount-words {
            margin-top: 25px;
            padding: 17px 20px;
            border-radius: 12px;
            background: #f1f5f9;
            border-left: 4px solid #111827;
        }

        .amount-words span {
            display: block;
            font-size: 10px;
            color: #6b7280;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .amount-words p {
            font-size: 13px;
            font-weight: 600;
        }

        /* Payment Badge */
        .paid-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #ecfdf5;
            color: #047857;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .paid-badge::before {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #10b981;
        }

        /* Footer */
        .receipt-footer {
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .thank-you h4 {
            font-size: 16px;
            margin-bottom: 7px;
        }

        .thank-you p {
            font-size: 11px;
            color: #8a919d;
        }

        .signature {
            text-align: center;
            width: 180px;
        }

        .signature-line {
            border-top: 1px solid #374151;
            margin-bottom: 8px;
        }

        .signature p {
            font-size: 10px;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
        }

        /* Bottom */
        .receipt-bottom {
            background: #f8fafc;
            padding: 14px 40px;
            display: flex;
            justify-content: space-between;
            font-size: 10px;
            color: #8a919d;
        }

        /* Print Button */
        .actions {
            max-width: 850px;
            margin: 20px auto;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn {
            border: none;
            border-radius: 8px;
            padding: 11px 18px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-print {
            background: #111827;
            color: #fff;
        }

        .btn-print:hover {
            background: #000;
        }

        /* Responsive */
        @media (max-width: 650px) {

            body {
                padding: 10px;
            }

            .receipt-header {
                padding: 25px 20px;
                flex-direction: column;
                align-items: flex-start;
            }

            .receipt-title {
                text-align: left;
            }

            .receipt-title h2 {
                font-size: 25px;
            }

            .receipt-content {
                padding: 25px 20px;
            }

            .meta-grid {
                grid-template-columns: 1fr;
            }

            .customer-card {
                grid-template-columns: 1fr;
            }

            .total-section {
                justify-content: stretch;
            }

            .total-box {
                width: 100%;
            }

            .receipt-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 35px;
            }

            .receipt-bottom {
                padding: 14px 20px;
                flex-direction: column;
                gap: 5px;
            }

            .signature {
                width: 180px;
            }
        }

        /* Print */
        @media print {

            @page {
                size: A4;
                margin: 10mm;
            }

            body {
                padding: 0;
                background: #fff;
            }

            .receipt-wrapper {
                max-width: 100%;
            }

            .receipt {
                box-shadow: none;
                border-radius: 0;
            }

            .actions {
                display: none;
            }

            .receipt-header {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .paid-badge {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .receipt-bottom {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>

    <!-- Print Button -->
    <div class="actions">
          <a href="<?php echo base_url('cashrecipt');?>" ><button class="btn btn-print" >
            <- Back
        </button> </a>
        <button class="btn btn-print" onclick="window.print()">
            🖨 Print Receipt
        </button>
    </div>

    <div class="receipt-wrapper">

        <div class="receipt">

            <!-- Header -->
            <div class="receipt-header">

                <div class="company">

                    <div class="company-logo">
                        <!-- Replace with your logo -->
                        <!-- <img src="logo.png" alt="Logo"> -->

                        <span>MI</span>
                    </div>

                    <div class="company-info">
                        <h1> MAYOORI FURNITURE ,ELECTRONICS & HOME APPLIANCES</h1>

                        <p>
                           <?php echo  $address->address;?>
                        </p>
                         <p>
                          PHONE: <?php echo  $address->phonenum;?>
                        </p>
                         <p>
                         EMAIL:  <?php echo  $address->email;?>
                        </p>
                        <p>
                          GSTIN: <?php echo  $address->gst_num;?>
                        </p>
                    </div>

                </div>

                <div class="receipt-title">
                    <h2>CASH RECEIPT</h2>
                    <span>PAYMENT RECEIVED</span>
                </div>

            </div>


            <!-- Content -->
            <div class="receipt-content">

                <!-- Receipt Details -->
                <div class="meta-grid">

                    <div class="meta-box">
                        <span class="meta-label">Receipt Number</span>
                        <div class="meta-value">CR-<?php echo $cashrecipt_details->referalnumber;?>  </div>
                    </div>

                    <div class="meta-box">
                        <span class="meta-label">Receipt Date</span>
                        <div class="meta-value"><?php echo date("d-m-Y",strtotime($cashrecipt_details->date));?></div>
                    </div>

                </div>


                <!-- Customer -->
                <div class="section-title">
                    <div class="number">01</div>
                    <h3>Customer Details</h3>
                </div>

                <div class="customer-card">
<?php

$id = $cashrecipt_details->receiptorpay_on;

$mainid = $cashrecipt_details->ledger;

if ($id == 1) {

    $ledger = $this->db
        ->where('le_id', $mainid)
        ->get('tbl_ledger')
        ->row();

    $ledgername = $ledger->le_name ?? '';
    $ledgerphonenumber = 'nil';
    $ledgeraddress = 'nil';

}  elseif ($id == 3 || $id==2 || $id==7) {

    $ledger = $this->db
        ->where('customer_id', $mainid)
        ->get('tbl_customer')
        ->row();

    $ledgername = $ledger->cus_name ?? '';
    $ledgerphonenumber = $ledger->cus_phonenumber ?? '';
    $ledgeraddress = $ledger->cus_address ?? '';

} elseif ($id == 4) {

    $ledger = $this->db
        ->where('sup_id', $mainid)
        ->get('tbl_supplier')
        ->row();

    $ledgername = $ledger->sup_name ?? '';
    $ledgerphonenumber = $ledger->sup_phoneno ?? '';
    $ledgeraddress = $ledger->sup_address ?? '';

} else {

    $ledgername = '';
    $ledgerphonenumber = '';
    $ledgeraddress = '';

}

?>
                    <div class="field">
                        <label>Received From <?php echo $mainid ;?></label>
                        <p><?php echo  $ledgername	;?></p>
                    </div>

                    <div class="field">
                        <label>Phone Number</label>
                        <p>+91<?php echo  $ledgerphonenumber;?> </p>
                    </div>

                    <div class="field">
                        <label>Address</label>
                        <p> <?php echo  $ledgeraddress;?></p>
                    </div>

                    <div class="field">
                        <label>Payment Status</label>
                        <span class="paid-badge">PAID</span>
                    </div>

                </div>


                <!-- Payment Details -->
                <div class="section-title">
                    <div class="number">02</div>
                    <h3>Payment Details</h3>
                </div>

                <table class="payment-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Payment Mode</th>
                            <th>Amount</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>01</td>

                            <td class="description">
                               <?php echo $cashrecipt_details->narration	;?>
                            </td>

                            <td>
                                Cash
                            </td>

                            <td class="amount">
                                ₹ <?php echo $cashrecipt_details->amount	;?>
                            </td>
                        </tr>

                    </tbody>

                </table>


                <!-- Total -->
                <div class="total-section">

                    <div class="total-box">

                        <div class="total-row">
                            <span>Subtotal</span>
                            <strong>₹  <?php echo $cashrecipt_details->amount	;?></strong>
                        </div>

                        <div class="total-row">
                            <span>Discount</span>
                            <strong>₹0.00</strong>
                        </div>

                        <div class="total-row grand-total">
                            <span>Total</span>
                            <span>₹ <?php echo $cashrecipt_details->amount	;?></span>
                        </div>

                    </div>

                </div>


                <!-- Amount in Words -->
                <div class="amount-words">

                    <span>Amount in Words</span>

                    <p>
                      <?php

function amountInWords($amount)
{
    $amount = number_format((float)$amount, 2, '.', '');

    $parts = explode('.', $amount);

    $number = (int)$parts[0];
    $decimal = (int)$parts[1];

    $ones = [
        '', 'One', 'Two', 'Three', 'Four', 'Five',
        'Six', 'Seven', 'Eight', 'Nine', 'Ten',
        'Eleven', 'Twelve', 'Thirteen', 'Fourteen',
        'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen',
        'Nineteen'
    ];

    $tens = [
        '', '', 'Twenty', 'Thirty', 'Forty',
        'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'
    ];

    function convertNumber($num, $ones, $tens)
    {
        if ($num < 20) {
            return $ones[$num];
        }

        if ($num < 100) {
            return $tens[intdiv($num, 10)] .
                (($num % 10) ? ' ' . $ones[$num % 10] : '');
        }

        if ($num < 1000) {
            return $ones[intdiv($num, 100)] . ' Hundred' .
                (($num % 100) ? ' ' . convertNumber($num % 100, $ones, $tens) : '');
        }

        if ($num < 100000) {
            return convertNumber(intdiv($num, 1000), $ones, $tens) .
                ' Thousand' .
                (($num % 1000) ? ' ' . convertNumber($num % 1000, $ones, $tens) : '');
        }

        if ($num < 10000000) {
            return convertNumber(intdiv($num, 100000), $ones, $tens) .
                ' Lakh' .
                (($num % 100000) ? ' ' . convertNumber($num % 100000, $ones, $tens) : '');
        }

        return convertNumber(intdiv($num, 10000000), $ones, $tens) .
            ' Crore' .
            (($num % 10000000) ? ' ' . convertNumber($num % 10000000, $ones, $tens) : '');
    }

    $words = convertNumber($number, $ones, $tens);

    if ($words == '') {
        $words = 'Zero';
    }

    if ($decimal > 0) {
        $words .= ' and ' . convertNumber($decimal, $ones, $tens) . ' Paise';
    }

    return 'Rupees ' . $words . ' Only';
}

echo amountInWords($cashrecipt_details->amount);

?>
                    </p>

                </div>


                <!-- Footer -->
                <div class="receipt-footer">

                    <div class="thank-you">
                        <h4>Thank You!</h4>

                        <p>
                            We appreciate your business and trust.
                        </p>
                    </div>

                    <div class="signature">

                        <div style="height: 35px;"></div>

                        <div class="signature-line"></div>

                        <p>Authorized Signature</p>

                    </div>

                </div>

            </div>


            <!-- Bottom Footer -->
            <div class="receipt-bottom">

                <span>
                    This is a computer-generated receipt.
                </span>

                <span>
                    Routeq Innovations Private Limited
                </span>

            </div>

        </div>

    </div>

</body>
</html>