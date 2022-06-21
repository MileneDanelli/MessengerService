<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-dark" id="btn">Clique</button>
            </div>
        </div>
    </body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://js.pusher.com/7.1/pusher.min.js"></script>
<script>
    $(document).ready(function() {
        $("#btn").on("click", function(e) {
            e.preventDefault();
            $.ajax({
                url: '/save'+'?_token=' + '{{ csrf_token() }}',
                type: 'POST',
                contentType: 'application/json',
                success: (data) => {
                    console.log("Hash: " + data.hash + " salva com Sucesso!")
                },
                error: (error) => {
                    console.log(error)
                }
            });
        })

        Pusher.logToConsole = true;

        let pusher = new Pusher('997f545405c9a18ef10b', {
            cluster: 'mt1'
        });

        let channel = pusher.subscribe('data');
        channel.bind('data.create', function(response) {
            alert("Segunda Aplicação cadastrou a Hash:" + response.hash + " com ID:" + response.id)
        })
    })
</script>
