<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	@if (session('message'))
	<div class = "alert alert-success">{{session('message')}}</div>
	@endif
	<h1>Add Product</h1>
	<form action="{{route('add')}}" method="post" enctype="multipart/form-data">
		@csrf
		Name:
		<input type="text" name="prod_name"><br> <br>
		Description:
		<textarea type="text" name="prod_des"></textarea><br> <br>
		Price:
		<input type="text" name="prod_price"><br> <br>
		Category:
		<select name="product_category">
			<option>select category</option>
			@foreach($category as $category)
				<option value="{{$category->id}}" >{{$category->cat_name}}</option>
				@endforeach
		</select><br><br>
		Image:
		<input type='file' name='prod_image[]' multiple />	<br><br>
		<input type="submit" value="Add Product">
	</form>
	
</body>
</html>