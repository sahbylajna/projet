<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>الشروط والأحكام</title>
</head>
<body style="    text-align-last: center;
">

    <p>


@php
        $term = \App\Models\term::first();

@endphp
{!!  $term->term_ar !!}


    </p>



</body>
</html>
