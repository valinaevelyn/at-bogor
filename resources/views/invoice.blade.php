<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Receipt</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: "SF Pro Text";
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(3) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #C7D2C7;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}

            .details{
                
            }
           
            .total{
                font-weight: bold;
            }

            .orderID{
                color: #fb2000;
                font-weight: lighter;
            }
            
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td>
                                    <h1>Ticket Invoice</h1>
									<h3 class="orderID">Order ID #{{$receipt->transId}}</h2>
								</td>

                                <td class="title">
									{{-- <img src="https://sparksuite.github.io/simple-html-invoice-template/images/logo.png"style="width: 100%; max-width: 300px"/> --}}
                                    <img
										src=""
										style="width: 100%; max-width: 300px"
									/>
                                    
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="3">
						<table>
							<tr>
								<td>
									Name<br />
									Email Address<br />
									Phone Number <br>
                                    Status
								</td>

								<td>
									: {{$receipt->buyer_name}}<br />
									: {{$receipt->email}}<br />
									: {{$receipt->phone}} <br>
                                    @if($receipt->status == '0')
                                        : Pending
                                    @elseif($receipt->status == '1')
                                        : Completed
                                    @elseif($receipt->status == 'cancelled')
                                        : Cancelled
                                    @else
                                        <p>: Status not recognized</p>
                                    @endif
								</td>
                            
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Destination</td>

					<td>Quantity</td>

                    <td>Price</td>
				</tr>

				<tr class="item">
					<td>{{$receipt->title}}</td>

					<td>{{$receipt->quantity}}</td>

					<td>{{number_format($receipt->price, 0, ',', '.')}}</td>
				</tr>

				<tr class="total">
					<td>Total</td>
                    
                    <td></td>
					<td>{{number_format($receipt->price * $receipt->quantity, 0, ',', '.')}}</td>
				</tr>
                <br>

				<div class="details">
                    <p>{{\Carbon\Carbon::parse($receipt->transDate)->format('D, d F Y')}} - Virtual Account BCA</p>
                </div>
				
			</table>
		</div>
	</body>
</html>