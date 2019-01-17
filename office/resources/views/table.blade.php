<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Product Registry</title>
  </head>
  <body>
    <div class="container">
        <h3>Product Table</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab distinctio dolore, magni odio doloribus quod cum enim tempore non reiciendis quisquam sapiente sit quis quam? Aliquid repellendus labore illo in.</p>
  <a href="/addproduct" class="btn btn-primary">ADD</a>
        <table class="table">
            
            <tr>                          
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Software</td>
                <td>Problem</td>
                <td>Solution</td>
                <td>Remark</td>
                <td>Solved</td>
                <td>Assigned By</td>
                <td>Created At</td>
                <td>Updated At</td>
                <td>Update</td>
                <td>Delete</td>
            </tr>
            @foreach($products as $product)
            <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->email}}</td>
            <td>{{$product->phone}}</td>
            <td>{{$product->soft_id}}</td>
            <td>{{$product->problem}}</td>
            <td>{{$product->solution}}</td>
            <td>{{$product->remark}}</td>
            <td>{{$product->solved}}</td>
                @if($product->user)
            <td>{{$product->user->email}}</td>
            @else
            <td>{{$product->user_id}} user not exsits</td>
@endif
            <td>{{$product->created_at}}</td>
            <td>{{$product->updated_at}}</td>
            <td></td>
            <td></td>
            </tr>
            @endforeach

        </table>
        
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>