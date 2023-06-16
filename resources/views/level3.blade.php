@extends('common.layout')

@section('style')

@endsection

@section('title')

@endsection

@section('header')

@endsection

@section('content')
    <div class="container">
        <div class="box mt-4">
            <div class="content has-text-centered">
                Day | Time
            </div>
            <div class="columns">
                <div class="column content has-text-left m-auto">
                    Total Purchase value: €
                    <br>
                    Sold Purchase value: €
                    <br>
                    Ordered: €
                </div>
                <div class="column content has-text-centered">
                    <figure class="image is-64x64 is-inline-block">
                        <img class="" src="/img/truckicon.png">
                    </figure>
                </div>
                <div class="column content has-text-right m-auto">
                    Truck Info
                </div>
            </div>
        </div>
        <input type="text" class="input" id="search-input" onkeyup="filterTheTable()" placeholder="Search using the customer's Name" style="margin-top: -10px; margin-bottom: 10px">

        <div class="columns has-text-centered">
            <div class="column">
                <div class="box table is-fullwidth is-striped is-hoverable is-centered pt-4 pb-4 mt-1">
                    <div class="content">
                        @for ($i = 0; $i < 6; $i++)
                            @if ($i != 2)
                                <div id="tableDisplay{{$i}}">
                                    <h1>Truck: {{$i}}</h1>

                                <table id="table{{$i}}">
                                    <thead>

                                    <tr>

                                        <th>Customer</th>
                                        <th>
                                                <?php
                                                $date = date('Y-m-d');
                                                $week = (int)date('W', strtotime($date));
                                                echo "Week ".($week - 4);
                                                ?>
                                        </th>
                                        <th>
                                                <?php
                                                $date = date('Y-m-d');
                                                $week = (int)date('W', strtotime($date));
                                                echo "Week ".($week - 3);
                                                ?>
                                        </th>
                                        <th>
                                                <?php
                                                $date = date('Y-m-d');
                                                $week = (int)date('W', strtotime($date));
                                                echo "Week ".($week - 2);
                                                ?>
                                        </th>
                                        <th>
                                                <?php
                                                $date = date('Y-m-d');
                                                $week = (int)date('W', strtotime($date));
                                                echo "Week ".($week - 1);
                                                ?>
                                        </th>

                                        <th width="100">Current Week</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $customer)
                                        @if($customer->truck_id == $i)


                                            <tr>

                                                <td>@if($customer->truck_id != -1)
                                                        {{$customer->name}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($customer->week4 != 0)
                                                        ✅
                                                    @else
                                                        ❌
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($customer->week3 != 0)
                                                        ✅
                                                    @else
                                                        ❌
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($customer->week2 != 0)
                                                        ✅
                                                    @else
                                                        ❌
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($customer->week1 != 0)
                                                        ✅
                                                    @else
                                                        ❌
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($customer->weekcr != 0)
                                                        ✅
                                                    @else
                                                        ❓
                                                    @endif

                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>

                                </table>
                                </div>

                            @endif
                        @endfor

                    </div>

                    <hr>

                </div>
            </div>

        </div>
        <script>
            function filterTheTable() {
                let input, filter, table, tr, td, i, txtValue, div;
                input = document.getElementById("search-input");
                filter = input.value.toUpperCase();
                let tablesFound = 0;
                for(let j = 0; j < 6; j++){
                    // Declare variables
                    div = document.getElementById(`tableDisplay${j}`)
                    if(j != 2) {
                        table = document.getElementById(`table${j}`);
                        tr = table.getElementsByTagName("tr");
                        let rowsFound = 0;
                        // Loop through all table rows, and hide those who don't match the search query
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[0];
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                    rowsFound++;
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }

                        }
                        if (rowsFound == 0) {
                            table.style.display = "none";
                            div.style.display = "none";
                            tablesFound--;
                        }
                        else  {table.style.display = "";
                            div.style.display = "";
                            tablesFound++;
                        }

                    }

                }
                if(tablesFound == -5){
                    alert("There are no customers with that name");
                }
                console.log(tablesFound);
            }

        </script>


@endsection

@section('footer')

@endsection





