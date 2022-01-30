<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Maisur Rahman Siddiki">
    <meta name="description" content="Simple Laravel CRUD with AWS DynamoDB">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>--}}
    <title>Home | Laravel CRUD with AWS DynamoDB | By Masiur</title>
</head>

<div class="container-sm">
    @include('nav')
</div>
<div class="container-sm">
    @if(session('status'))
        <p class="alert {{ session()->get('alert-class', 'alert-info') }}">{{ session('status') }}</p>
    @endif
    <br>
    <div class="row">
        <div class="col-4">
            <article>
                Hello there, this is a simple project developed with..
                <ul>
                    <li>Laravel (PHP Framework)</li>
                    <li>AWS DynamoDb</li>
                    <li>Hosted on AWS Lamda(Serverless) using Bref</li>
                </ul>
            </article>
        </div>
        <div class="col-8">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Reg</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $counter = 1;
                @endphp
                @foreach($students as $student)
                    <tr>
                        <th scope="row">{{ $counter++ }}</th>
                        <td>{{ $student['Name'] }}</td>
                        <td>{{ $student['Reg'] }}</td>
                        <td>{{ $student['updated_at'] }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('edit', ['id' => $student->Id]) }}">Edit</a>
                            <a onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger" href="{{ route('delete', ['id' => $student->Id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



</div>
<div class="sm-container">
    <div class="fixed-bottom" style="padding: 5px">
        <div class="text-center">Made With ❤ By <a style="text-decoration: none;" target="_blank" href="https://www.masiursiddiki.com/"><i>Masiur Rahman Siddiki</i> </a></div>
    </div>
</div>

</body>
</html>
