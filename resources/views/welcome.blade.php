<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 p-2" style="box-shadow:1px 1px 15px #aaa;">
                    <form action="/export-by-date" method="get">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="start-date">Start Date</label>
                                    <input type="date" name="start_date" required />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="start-date">End Date</label>
                                    <input type="date" name="end_date" required />
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-warning">Export Excel</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </body>
</html>
