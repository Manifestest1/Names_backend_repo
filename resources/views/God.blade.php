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
            <div class="card-header"> god Names</div>
            <div class="card-body">
                <center>
                    <form action="search" method="GET">
                        <div >
                            <input type="text"style=" margin: 5px;" border-radius:10px; name="search" class="btn btn-info">
                            <button style="border-radius: 20px;"type="submit" class="btn btn-outline-success col-lg">search</button>
                        </div>
                    </form>
                </center>
                <table class="table table-bordered   mt-2">
                    <thead>
                      <tr>
                        <th> God Names</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach( $data as $showgodnames) 
                        <tr>
                            <td>{{ $showgodnames->godname}}</td>
                        </tr>

                      @endforeach
                     </tbody> 
                </table>    
            </div> 
        </div>
    </div>
</body>
</html>