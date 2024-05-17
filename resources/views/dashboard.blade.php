@php
    $user = Auth::user();
    $drop1 = $drop1 ?? '';
    $drop2 = $drop2 ?? [];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h3>Dashboard</h3>
                    </div>
                    <div class="row p-3">
                        <div class="col-md-6">
                            <h3>Hello, {{ $user->name }}</h3>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('log_out') }}">Log Out</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dashboard_submit') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <select class="form-control" id="drop1" name="drop1" required>
                                    <option value="">Select Option</option>
                                    <option @if ($drop1 == 'option1')
                                        selected
                                    @endif value="option1">Option 1</option>
                                    <option @if ($drop1 == 'option2')
                                    selected
                                @endif value="option2">Option 2</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <select class="form-control" id="drop2" name="drop2[]" multiple required>
                                    <option value="">Select Option</option>
                                    @if ($drop1 == 'option1')
                                        <option value="step11">step11</option>
                                        <option value="step12">step12</option>
                                        <option value="step13">step13</option>
                                        <option value="step14">step14</option>
                                    @elseif ($drop1 == 'option2')
                                        <option value="step21">step21</option>
                                        <option value="step22">step22</option>
                                        <option value="step23">step23</option>
                                        <option value="step24">step24</option>
                                    @endif
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>
                    </div>
                    @if ($drop1 !='')
                        <div>
                            <h3>Selected Options</h3>
                            <p>Option 1: {{ $drop1 }}</p>
                            <ul>
                                @foreach ($drop2 as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $("#drop1").change(function() {
                updateSecondDropdown();
            });
        });

        function updateSecondDropdown() {
            var drop1 = $("#drop1").val();
            var drop2 = $("#drop2");
            drop2.empty(); // Clear the previous options

            if (drop1 === 'option1') {
                drop2.append('<option value="step11">step11</option>');
                drop2.append('<option value="step12">step12</option>');
                drop2.append('<option value="step13">step13</option>');
                drop2.append('<option value="step14">step14</option>');
            } else if (drop1 === 'option2') {
                drop2.append('<option value="step21">step21</option>');
                drop2.append('<option value="step22">step22</option>');
                drop2.append('<option value="step23">step23</option>');
                drop2.append('<option value="step24">step24</option>');
            }
        }
    </script>
</body>
</html>
