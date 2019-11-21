<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
	<table border="0" cellpadding="1" cellspacing="0" width="100%">
		<tr>
			<td align="left" colspan="5">F-PSOR-012</td>
			<td align="right" colspan="5">REV : 00</td>
		</tr>
		<tr>
			<td align="center" colspan="10">HIL INDUSTRIES BERHAD</td>
		</tr>
		<tr>
			<td align="center" colspan="10"><u>BILL OF MATERIAL</u></td>
		</tr>
		<tr>
			<td align="right" colspan="10">NEW PART / AMENDMENT</td>
		</tr>
		@foreach($bom_hdr as $hdr)
			<tr>
				<td>Customer</td><td>:</td><td>{{ $hdr->customer_name }}</td><td>&nbsp;</td><td>Date of Issue</td><td>:</td><td>{{ $hdr->date_of_issue }}</td><td>Rev</td><td>:</td><td>0</td>
			</tr>
			<tr>
				<td>Product Code</td><td>:</td><td>{{ $hdr->product_code }}</td><td>&nbsp;</td><td>Color</td><td>:</td><td colspan="4">{{ $hdr->color }}</td>
			</tr>
			<tr>
				<td>Description</td><td>:</td><td>{{ $hdr->product_name }}</td><td>&nbsp;</td><td>Type of Material</td><td>:</td><td colspan="4">{{ $hdr->type_of_material }}</td>
			</tr>
			<tr>
				<td>Parent Part Code</td><td>:</td><td>-</td><td>&nbsp;</td><td>Gross Weight</td><td>:</td><td>{{ $hdr->gross_weight }}</td><td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td>Mould Code/Life Span</td><td>:</td><td>{{ $hdr->life_span_num_time }}</td><td>&nbsp;</td><td>Net Weight</td><td>:</td><td>{{ $hdr->net_weight }}</td><td colspan="3">&nbsp;</td>
			</tr>
				<tr>
				<td>Mould/Cavity</td><td>:</td><td>{{ $hdr->cavity_text }}</td><td>&nbsp;</td><td>MP Net Weight</td><td>:</td><td>{{ $hdr->mp_net_weight }}</td><td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td>Machine Tonage</td><td>:</td><td>{{ $hdr->machine_tonage_text }}</td><td>&nbsp;</td><td>Process</td><td>:</td><td colspan="4">{{ $hdr->process }}</td>
			</tr>
			<tr>
				<td>Machine Code</td><td>:</td><td>{{ $hdr->machine_code }}</td><td>&nbsp;</td><td>Cycle Time/Short</td><td>:</td><td>{{ $hdr->cycle_time_num }}</td><td>Manpower Req.</td><td>:</td><td>{{ $hdr->cycle_time_mp }}</td>
			</tr>
			<tr>
				<td>Prepared By</td><td>:</td><td>{{ $hdr->prepared_by }}</td><td>&nbsp;</td><td>Assy C/Time</td><td>:</td><td>{{ $hdr->assy_time_num }}</td><td>Manpower Req.</td><td>:</td><td>{{ $hdr->assy_time_mp }}</td>
			</tr>
		@endforeach
			
		<!-- @foreach($bom_hdr as $row)
		<tr>
			<td>{{ $row->customer_code }}</td>
		</tr>
		@endforeach -->
	</table>
</body>
</html>