@extends('layout.master', ['title' => 'testMagic'])

@section('topScript')
    <!-- MagicSuggest CSS -->
    <link rel="stylesheet" href="css/magicsuggest-min.css">
 <style></style>
@endsection

@section('content')
    @if (count($info_s) > 0)
        <ul>
            @foreach ($info_s as $info)
                <li>
                    Code <b>{{ $info->code }}</b> With <b>{{ $info->description }}</b>
                </li>
            @endforeach
        </ul>
    @endif

    <input id="magicsuggest" name="descriptions[]"/>
    <br/>
    <p id="test1"> Hi </p>
    <p id="test2"> Hi There </p>
    <button id="try">Click</button>
@endsection

@section('script')
    <!-- MagicSuggest JS -->
    <script src="js/magicsuggest-min.js"></script>
    <script>

        /*
        //Dummy data
        var datas = [
            { "id" : 1, "description" : "trying", "whatever" : "lol" },
            { "id" : 2, "description" : "again", "whatever" : "lol" }
        ];
        */
        $(function() {
            var Magic = $('#magicsuggest').magicSuggest({
                allowFreeEntries: false,
                maxSelection: 1,
                hideTrigger: true,

                noSuggestionText: 'No COA found',
                placeholder: 'Enter COA',
                //strictSuggest: true, //no longer useful since using mode:'remote'?
                mode: 'remote', //changes the filter

                //data: {!! $info_s !!},
                data: 'testMData.php',
                displayField: 'code',
                valueField: 'description',

                renderer: function(data){   //aka display for combobox
                    return '<div class="codeDisp">' +
                            data.code + '</div>' +
                            '<div class="descDisp">' +
                            data.description + '</div>';
                },
                selectionRenderer: function(data){  //aka display after selected
                    return data.code;
                }
            });

            var Num = 1;
            $(Magic).on('selectionchange', function(e,m) {
                $("#test1").text(this.getValue());
                Num++;
            });
            $('#try').on('click', function(e,m) {
                if ($("#test1").text() == "Asset") {
                    $("#test2").text("It is Asset");
                } else {
                    $("#test2").text("Not Asset");
                }
            });
        });
    </script>
@endsection
