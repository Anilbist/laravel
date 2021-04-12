<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>categories lists</h1>
	@if(session('message'))
	<div class="alert alert-success">{{session('message')}}</div>
	@endif
	<a href="prod/add">Add product</a>
	<a href="dashboard">Back</a>
	<table border="1px">
	<thead>
					<th>Name</th>
					<th>Description</th>
					<th>Price</th>
					<th>image</th>
					<th colspan="2">Operation</th>
	</thead>
	@foreach($products as $product)
	<tr>
		
		
		<td>{{$product['p_name']}}</td>
		<td>{{$product['p_des']}}</td>
		<td>{{$product['p_price']}}</td>
		@foreach($product['image'] as $image)
		<td><img src="{{asset('images')}}/{{$image['p_image']}}"></td>
		@endforeach
		<td><a href="prod/edit/{{$product['id']}}">edit</a></td>
		<td><a href="prod/delete/{{$product['id']}}">delete</a></td>
	</tr>
	@endforeach
</table>
</body>
</html>	

