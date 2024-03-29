<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
</head>
<body>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">User Name</div>
            <div class="card-body">
                <center>
                    <div>
                        <select class="form-control" id="religion_id" class=" btn btn-info" onchange="religionsChange()">
                            <option>Please select Religion</option>
                            @foreach($religiondata as $religion)
                            <option value="{{$religion->id}}" <?php if(Request::get('religion_id')==$religion->id){ echo 'selected';}  ?> >{{$religion->religion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <select id="gender" class="form-control" onchange="genderChange()">
                            <option>Please select gender</option>
                            <option <?php if(Request::get('gender')=='male'){ echo 'selected';}  ?> value="male">Male</option>
                            <option <?php if(Request::get('gender')=='female'){ echo 'selected';}  ?> value="female">Female</option>
                            <option <?php if(Request::get('unisex')=='unisex'){ echo 'selected';}  ?> value="unisex">Unisex</option>
                        </select>
                    </div>
                    <form action="showuser" method="GET">
                        <div class = "show">
                            <input type="text" name="search">
                            <button type="submit" class="btn btn-warning">search</button>
                        </div> 
                       <div class ="searchletter">
                        <a class ="search" href="{{ route('users.index') }}">All</a>
                         @foreach(range('A', 'Z') as $letter)
                        <a onclick="searchByAlphbetical('{{$letter}}')" class="searchalpha">{{ $letter }}</a>
                         @endforeach
                        </div>
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
    function religionsChange()
    {
        var religion = $("#religion_id").val();
        var url = "{{url('')}}";
        window.location.href = url+'/showuser?religion_id='+religion;
    }
    function getUrlParameterReligion(name) 
    {
        var searchParams = new URLSearchParams(window.location.search);
        return searchParams.get(name);
    }

     function getUrlParameterGender(name) 
    {
        var searchParams = new URLSearchParams(window.location.search);
        return searchParams.get(name);
    }

     function genderChange() 
    {
        var gender = $("#gender").val();
        var religion_id = getUrlParameterReligion('religion_id');
        if (religion_id) 
        {
            var current_url = window.location.href;
            window.location.href = current_url+'&gender='+gender;
        }
        else
        {
            var current_url = window.location.href;
            window.location.href = current_url+'?&gender='+gender;
        }
    }

    function searchByAlphbetical(letter)
    {
        var religion_id = getUrlParameterReligion('religion_id');
        var gender_id = getUrlParameterGender('gender');
        if (religion_id) 
        {
            var current_url = window.location.href;
            window.location.href = current_url+'&letter_alph='+letter;
        }
        else if(!religion_id)
        {
            var current_url = window.location.href;
            window.location.href = current_url+'?&letter_alph='+letter;
        }
        if (gender_id) 
        {
            var current_url = window.location.href;
            window.location.href = current_url+'&letter_alph='+letter;
        }
        else if(!gender_id)
        {
            var current_url = window.location.href;
            window.location.href = current_url+'?&letter_alph='+letter;
        }
        
        console.log(religion_id,"letter");
        
    }

   
</script>
</html>