<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">User Name</div>
            <div class="card-body">
                <center>
                    <form action="search_data" method="GET">
                        <div style="float: right; margin: 5px;">
                            <input type="text" name="search">
                            <button type="submit" class="btn btn-warning">search</button>
                        </div>
                    </form>
                </center>
                <table class="table table-bordered table-striped  mt-2">
                    <thead>
                      <tr>
                        <th> God Name</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $id => $show)
                        <tr>
                          <td>{{ $show->name}}</td>
                        </tr>
                        @endforeach
                     </tbody> 
                </table>    
            </div> 
        </div>
    </div>
</body>
</html>