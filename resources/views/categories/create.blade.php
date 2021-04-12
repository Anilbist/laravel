@if (session('message'))
<div class = "alert alert-success">{{session('message')}}</div>
@endif
<h1>category</h1>
<form action="{{route('create')}}" method="post">
		@csrf
		
		<input type="text" name="cat"><br> <br>
		<input type="submit" value="Add category">
</form>