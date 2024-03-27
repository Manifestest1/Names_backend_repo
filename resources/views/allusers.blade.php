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
                    <div>
                        <select style="float:left;" class=" btn btn-info" onchange="religionsChange()">
                            @foreach($religiondata as $religion)
                            <option value="{{$religion->id}}">{{$religion->religion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <form action="search_data" method="GET">
                        <div style="float: right; margin: 5px;">
                            <input type="text" name="search">
                            <button type="submit" class="btn btn-warning">search</button>
                        </div> 
                       <div style="float: left;margin: 5px;font-size: 18px;">
                        <a style="text-decoration: none; padding: 5px 10px 5px 10px;background: var(--bs-card-cap-bg);" href="{{ route('users.index') }}">All</a>
                         @foreach(range('A', 'Z') as $letter)
                        <a style="text-decoration: none; padding: 5px 10px 5px 10px;background: var(--bs-card-cap-bg);" href="{{ route('users.index', ['letter' => $letter]) }}">{{ $letter }}</a>
                         @endforeach
                        </div>
                        <!--  <div style="float: right; margin: 5px;">
                            <input type="text" name="search">
                            <button type="submit" class="btn btn-warning">search</button>
                        </div> -->
                    </form>
                </center>
                <table class="table table-bordered table-striped  mt-2">
                    <thead>
                      <tr>
                        <th>Users Name</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @if(!empty($searchletter))
                            <td>{{$searchletter}}</td>
                            @endif
                        </tr>
                        @foreach($data as $id => $show)
                        <tr>
                          <td>{{ $show->name}}</td>
                        </tr>
                        @endforeach
                     </tbody> 
                </table>
            {{ $data->appends(request()->input())->links('pagination::bootstrap-5') }}
            </div> 
        </div>
    </div>
</body>
<script type="text/javascript">
    function religionsChange(){
        // alert('n')
        var selectedValue = document.write("$religion->id").value('');
        document.write(" religion_id: " + selectedValue);



    }
</script>
</html>