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
	<a href="cat/create">Add category</a>
	<a href="dashboard">Back</a>


	<table border="1px">
	<thead>
					<th>Name</th>
					<th>Created At</th>
					<th colspan="3">Operation</th>
	</thead>
	@foreach($categories as $category)
	<tr>
		<!-- <?php var_dump($categories) ?>  -->
		
		<td>{{$category['cat_name']}}</td>
		<td>{{$category['created_at']}}</td>
		<td><a href="cat/edit/{{$category['id']}}">edit</a></td>
		<td><a href="cat/details/{{$category['id']}}">details</a></td>

		<td><a href="cat/delete/{{$category['id']}}">delete</a></td>
	</tr>
	@endforeach
</table>
</body>
</html>	

