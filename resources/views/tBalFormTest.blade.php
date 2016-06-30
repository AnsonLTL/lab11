@extends('layout.master', ['title' => 'tBalForm'])

@section('topScript')
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.1/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.1/jsgrid-theme.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.4.1/jsgrid.min.js"></script>
@endsection

@section('css')
@endsection

@section('content')
    <div id="jsGrid">
        <script>
            var tBalData = [
                { "Year": "2000", "COA": "1234", "Description" : "->Buildings", "Debit/Credit" : 1, "Amount" : "10" },
                { "Year": "2001", "COA": "1234", "Description" : "->Buildings", "Debit/Credit" : 2, "Amount" : "100" }
            ];

            var accType = [
                { "Name": "", "Id": 0 },
                { "Name": "Credit", "Id": 1 },
                { "Name": "Debit", "Id": 2 }
            ];

            $("#jsGrid").jsGrid({
                width: "100%",
                height: "400px",

                filtering: true,
                inserting: true,
                editing: true,
                sorting: true,
                paging: true,
                //autoload: true,

                pageSize: 5,
                pageButtonCount: 2,

                deleteConfirm: "Really Delete?",
                data: tBalData,

                //controler: db,

                fields: [
                    { name: "Year", type: "number", width: 25, validate: "required" },
                    { name: "COA", type: "number", width: 25 },
                    { name: "Description", type: "text"},
                    { name: "Debit/Credit", type: "select", items: accType, valueField: "Id", textField: "Name", width: 25, readOnly: true },
                    { name: "Amount", type: "number", width: 25 },
                    { type: "control", width: 25 }
                ]
            });
        </script>
    </div>
@endsection

@section('script')
@endsection
