<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('addimage.update',$student->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{$student->name}}" id="">
        <br>
        <input type="file" name="image" value="" id="">
        <img src="{{asset('uploads/students/'.$student->image)}}" width="200px" height="150px" alt="">
        <br>
        <input type="submit" value="Upload" id="">
    </form>
                                        
</body>
</html>