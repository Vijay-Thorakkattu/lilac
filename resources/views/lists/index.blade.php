<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #adb5bd !important;
        }
    </style>
</head>
<body>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="container bg-gray-100">
            <div class="row justify-content-center mt-1">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Search</h6>
                        </div>
                        <div class="input-group">
                            <input type="search" class="form-control rounded" placeholder="Search name/department/designation" aria-label="Search"
                                   aria-describedby="search-addon" id="search-input" />
                        </div>
                    </di>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row mt-3" id="search-results-container">
                        @if($users->isEmpty())
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert">
                                No data found.
                            </div>
                        </div>
                        @else
                        @foreach($users as $user)
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>{{ $user->name }}</b></h5>
                                        <p class="card-text"><b>{{ $user->department->name ?? 'No Department' }}</b></p>
                                        <p class="card-text">{{ $user->designation->name ?? 'No Designation' }}</p>
                                        <p class="card-text">{{ $user->phone_number }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#search-input').on('keyup', function() {
                var query = $(this).val();
                
                $.ajax({
                    url: "{{ route('search') }}",
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(response) {
                        $('#search-results-container').html(response.searchResults);
                    }
                });
            });
        });
    </script>

</body>
</html>
