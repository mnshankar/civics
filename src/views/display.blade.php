<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Civics Test</title>
    <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.6/readable/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <br/><br/>
    <div class="col-sm-offset-2 col-sm-8">
        <h2>Civics Practice FlashCards <span class="pull-right">
                <a href="/civics/shuffle" class="btn btn-success btn-sm">
                    Shuffle <i class="glyphicon glyphicon-refresh"></i></a> </span>
        </h2><br/>
        @if (Session::has('civics_message'))
            <div class="alert alert-warning">{{Session::get('civics_message')}}</div>
        @endif
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Question #{{$id}}</h3>
            </div>
            <div class="panel-body lead">
                {{$row->question}}
                <div class="pull-right" data-toggle="tooltip" data-placement="right" title="View Answer!">
                    <a href="#answer" data-toggle="collapse"><i class="glyphicon glyphicon-eye-open"></i></a>
                </div>
            </div>
            <div id="answer" class="panel-footer collapse">
                @foreach(explode('|', $row->answer) as $item)
                    <li>{{$item}}</li>
                @endforeach
                <a href="{{$row->extra}}" target="_blank">{{$row->extra}}</a>
            </div>
        </div>
        <form method="post" action="/civics/{{$id}}/update">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
            <div class="form-group text-center">
                <button class="btn btn-info btn-lg pull-left" type="submit" name="btn" value="prev">&laquo; Previous </button>
                <button class="btn btn-primary btn-lg pull-right" type="submit" name="btn" value="next">Next &raquo;</button>
            </div>
        </form>
    </div>
</div>
<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</body>
</html>
