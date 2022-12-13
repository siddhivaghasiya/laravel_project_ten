

<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        form {
            margin-top: 27px;
        }

        .card.card-primary {
            margin-top: 40px;
        }

        .container {
            width: 1046px;
        }

        .error {
            color: red;
        }

        div.nm {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 28px;
            width: 506px;
            margin-top: 50px;
            margin-left: 359px;
        }

        h2.nm {
            text-align: center;
        }
    </style>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="{{ asset('theme/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/additional-methods.min.js') }}"></script>
</head>

<body>

    <div class="nm">
    <h3 class="nm">
       &nbsp; @if (isset($editdata))
             Edit Feature
        @else
        Add Feature
        @endif
    </h3>

    @if (isset($editdata))
        {!! Form::model($editdata, [
            'url' => route('features.update', $editdata->id),
            'id' => 'features',
            'method' => 'put',
            'enctype' => 'multipart/form-data',
        ]) !!}
    @else
        {!! Form::open([
            'url' => route('features.save'),
            'id' => 'features1',
            'method' => 'post',
        ]) !!}
    @endif



    <div class="form-group">
        <label>Features Name:</label>
        {!! Form::text('features_name', null, [
            'id' => 'features_name',
            'placeholder' => 'Enter name',
            'class' => 'form-control',
        ]) !!}
        @if ($errors->has('features_name'))
            <span class="text-danger">{{ $errors->first('features_name') }}</span>
        @endif
    </div>



    {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}

    <a href="{{ route('features.index') }}" class="btn btn-danger">Cancle</a>

    {!! Form::close() !!}

    </div>
</div>

</body>

</html>

