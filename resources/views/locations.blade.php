<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <table class="table table-bordered mt-5 text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Lattitude</th>
                <th scope="col">Longitude</th>
                <th>Map</th>
                <th scope="col">Time</th>
                <th scope="col">Last Update</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach($locations as $location)
                    @php
                        $i = $i + 1;
                    @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$location->lat}}</td>
                        <td>{{$location->long}}</td>
                        <td>
                            <a href="http://www.google.com/maps/place/{{$location->lat}},{{$location->long}}" target="_blank">
                                View Location
                            </a>
                        </td>
                        <td>{{\Carbon\Carbon::parse($location->created_at)->format('d M Y, h:i a')}}</td>
                        <td>{{\Carbon\Carbon::parse($location->updated_at)->format('d M Y, h:i a')}}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>