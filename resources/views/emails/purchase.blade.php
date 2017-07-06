<html>
<body>
Here are the requests to IMMA.

<table>
	<tr>
		<th>No</th>
		<th>Imma Code</th>
		<th>Name</th>
		<th>Count</th>
		<th>Description</th>
	</tr>

	<?php $no=0 ?>
	@foreach($items as $item)
	<?php $no ++; ?>
	<tr>
		<td>{{$no}}</td>
		<td>
			@if(isset($item["imma_id_code"]))
				{{$item["imma_id_code"]}}
				@else
				&nbsp;
			@endif
		</td>
		<td>
			@if(isset($item["name"]))
				{{$item["name"]}}
				@else
				&nbsp;
			@endif
		</td>
		<td>
			@if(isset($item["count"]))
			{{$item["count"]}}
			@else
				&nbsp;
			@endif
		</td>
		<td>
			@if(isset($item["description"]))
			{{$item["description"]}}
			@else
				&nbsp;
			@endif
		</td>
	</tr>
	@endforeach
</table>

</body>
</html>