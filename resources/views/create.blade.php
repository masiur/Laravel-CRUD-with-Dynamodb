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
    <title>Create | Laravel CRUD with AWS DynamoDB | By Masiur</title>
</head>

    <div class="container-sm">
        @include('nav')
    </div>

    <div class="container-sm">
        <div class="row justify-content-center">
            <div class="col-4">


                <form role="form" action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Full Name"  class="form-control" required>

                    </div>
                    <br>
                    <div class="form-group">
                        <label for="reg">Registration NO</label>
                        <input type="text" name="reg" placeholder="5 Digit ID Number" maxlength="5" class="form-control" required>

                    </div>

                    <!--			    <div class="form-group">-->
                    <!--			      <label for="cgpa">CGPA</label>-->
                    <!--			      <input type="text" name="cgpa" placeholder="Provide CGPA as '4.00'" class="form-control">-->

                    <!--			    </div>-->
                    <br>
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>

                </form>

            </div>
        </div>
    </div>
</body>
</html>
