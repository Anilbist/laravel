
<h1>category</h1>
<form action="{{route('update',$category->id)}}" method="post">
		@csrf
		<input type="hidden" name="" value="{{$category->id}}">
		<input type="text" name="cat" value="{{$category->cat_name}}"><br> <br>
		<input type="submit" value="Update">
</form>