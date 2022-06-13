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
<script>
    $(document).ready(function() {
        $("#btn").on("click", function(e) {
            e.preventDefault();
            $.ajax({
                url: "/save",
                type: 'POST',
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                   alert("Hash: " + data.hash + " salva com Sucesso!")
                },
                error: (error) => {
                    alert(error)
                }
            });
        })
    })
</script>
