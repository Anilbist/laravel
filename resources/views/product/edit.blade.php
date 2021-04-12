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
	<form action="{{route('update',$editProd->id)}}" method="post" enctype="multipart/form-data">
		@csrf
		Name:
		<input type="text" name="prod_name" value="{{$editProd['p_name']}}"><br> <br>
		Description:
		<textarea type="text" name="prod_des" >{{$editProd['p_des']}}</textarea><br> <br>
		Price:
		<input type="text" name="prod_price" value="{{$editProd['p_price']}}"><br> <br>
		Category:
		<select name="product_category">
			<option>select category</option>
			@foreach($category as $category)
				<option value="{{$category->id}}" {{$category->id == 2 ? 'selected' :''}}> {{$category->cat_name}}</option>
			@endforeach
		</select><br><br>
		Image:
		@foreach($editProd['image'] as $image)
		<td><img src="{{asset('images')}}/{{$image['p_image']}}"></td>
		@endforeach
		<input type='file' name='prod_image[]' multiple/>	<br><br>
		<input type="submit" value="Update">
	</form>
	
</body>
</html>