<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{url('/addimage')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="">
        <br>
        <input type="file" name="image" id="">
        <br>
        <input type="submit" value="Submit" id="">
    </form>

    <h1>students Data</h1>
    @foreach($student as $stud)
    <li>{{$stud -> name}}<img src="{{asset('uploads/students/'.$stud->image)}}" width="200px" height="150px" alt="">
        <a href="{{url('addimage/'.$stud->id.'/edit')}}">edit</a>
        <form action="{{route('addimage.destroy', $stud->id)}}" method="POST">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>

        </form>
    </li>
    @endforeach
</body>

</html>