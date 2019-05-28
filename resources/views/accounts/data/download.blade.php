@extends('layouts.app')

@section('content')
    <div class="ui main container">
        <h2 class="ui header">Download my Data</h2>
        <p>Under our Privacy Policy you have the right to access and delete all of the data that we store in our databases. Your data will be delivered by ZIP file containing JSON files.</p>
        <br/>
        <a href="#" onclick="getDownload()" class="ui large blue button">Download</a>
        <p id="results"></p>
        <script>
            function getDownload() {
                $('.ui.large.blue.button').addClass('loading');
                $.ajax({
                    type:'POST',
                    url:'{{route('account.datadownload.request')}}',
                    headers:
                        {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    success:function(downloadUrl) {
                        $('.ui.large.blue.loading.button').text('Downloaded').removeClass('loading').removeClass('blue').addClass('green').addClass('disabled');
                        $('#results').text('Success! If your browser does not start the download, please check that it is not stopping a pop-up or similar from opening.');
                        window.open(downloadUrl,'_blank');
                    },
                    error: function(xhr, status, error) {
                        $('.ui.large.blue.loading.button').text('Failed').removeClass('loading').removeClass('blue').addClass('red').addClass('disabled');
                        var err = eval("(" + xhr.responseText + ")");
                        $('#results').html('An error has occurred. Please contact us to retrieve your data.<br>Error: '+err.Message);

                    }
                });
            }
        </script>
    </div>
@endsection
