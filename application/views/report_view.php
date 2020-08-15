<table class="table">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Request Name</th>
			<th scope="col">Request Date</th>
			<th scope="col">Request Type</th>
			<th scope="col">Port Origin</th>
			<th scope="col">Port Destination</th>
			<th scope="col">Weight (Kg)</th>
			<th scope="col">Dimension</th>
		</tr>
	</thead>
	<div class="col-md-12">
		<button style="margin-left: 930px" class="btn btn-success">Export to Excel</button>
	</div>
	<br>
	<tbody>
		<?php foreach($data as $row){ 
			?>
			<tr>
				<td><?php echo $row->pengirimanId; ?></td>
				<td><?php echo $row->RequestBy; ?></td>
				<td><?php echo $row->RequestDate; ?></td>
				<td><?php echo $row->requestType; ?></td>
				<td><?php echo $row->portOrigin; ?> - <?php echo $row->port_origin_name; ?></td>
				<td><?php echo $row->PortDestination; ?> - <?php echo $row->port_destination_name; ?></td>
				<td><?php echo $row->Weight; ?></td>
				<td><?php echo $row->Dimension; ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>