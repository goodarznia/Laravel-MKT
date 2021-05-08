@extends('layouts.master')
@section('page_title','List of Datasets')

@section('content')
    <div class="table">
        <a href="/user_area/datasets/create">
            <button class="btn btn-success"><i class="fa fa-plus"></i> Add new dataset</button>
        </a>
    </div>
    <div class="form-inline">Sort by: <select class="form-control" id="type" onchange="sortTable()">
            <option value="0">Title</option>
            <option value="1" selected="selected">Submission Time</option>
            <option value="2">Activation Energy</option>
            <option value="3">MKT</option>
        </select></div>
    <div class="card mb-4">
        <table class="table table-hover" id="Table">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Submission Time(UTC)</th>
                <th scope="col">Activation Energy</th>
                <th scope="col">MKT</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($datasets as $dataset)
                <tr>
                    <td>{{$dataset->title}}</td>
                    <td>{{$dataset->created_at}}</td>
                    <td>{{$dataset->activation_energy}}</td>
                    <td>{{$dataset->MKT}}</td>
                    <td><a href="/user_area/datasets/{{$dataset->id}}">
                            <button class="btn"><i class="fa fa-info"></i></button>
                        </a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="table-info">
        You can click on
        <button class="btn"><i class="fa fa-info"></i></button>
        icon to get more information about each Dataset.
    </div>

    <script>
        function sortTable() {
            var sortIndex, table, rows, switching, i, x, y, shouldSwitch;
            sortIndex = parseInt(document.getElementById("type").value);
            table = document.getElementById("Table");
            switching = true;
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    /*Get the two elements you want to compare,
                    one from current row and one from the next:*/
                    x = rows[i].getElementsByTagName("TD")[sortIndex];
                    y = rows[i + 1].getElementsByTagName("TD")[sortIndex];
                    //check if the two rows should switch place:
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
    </script>
@endsection
@section('pagination')

@endsection

