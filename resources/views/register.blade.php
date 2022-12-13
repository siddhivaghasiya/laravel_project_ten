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
        <h2 class="nm">Register Form</h2>



        {{ Form::open([
            'url' => route('register.store'),
            'id' => 'register',
            'method' => 'post',
            'enctype' => 'multipart/form-data',
        ]) }}



        @csrf

        <div class="form-group">
            <label>Name:</label>
            {!! Form::text('name', null, [
                'id' => 'name',
                'placeholder' => 'Enter name',
                'class' => 'form-control',
            ]) !!}

            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif

        </div>

        <div class="form-group">
            <label>User Name:</label>
            {!! Form::text('user_name', null, [
                'id' => 'user_name',
                'placeholder' => 'Enter user name',
                'class' => 'form-control',
            ]) !!}
            @if ($errors->has('user_name'))
                <span class="text-danger">{{ $errors->first('user_name') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label>Email:</label>
            <div>

                {!! Form::email('email', null, [
                    'id' => 'email',
                    'placeholder' => 'Enter email',
                    'class' => 'form-control',
                ]) !!}

                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif

            </div>
        </div>

        <div class="form-group">
            <label>Password:</label>
            <div>
                {!! Form::password('password', null, [
                    'id' => 'password',
                    'placeholder' => 'Enter password',
                    'class' => 'form-control',
                ]) !!}
            </div>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>



        {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}


        {!! Form::close() !!}

    </div>



</body>

</html>
