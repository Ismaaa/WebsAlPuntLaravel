<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="col-md-2"></div>
        <div class="panel-group col-md-8">
            <div class="panel panel-primary">
            <div class="panel-heading">Resultats</div>
                <table class="table table-striped table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Ingredient
                            </th>
                            <th>
                                Receptes amb aquest ingredient
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                    @php
                        $anterior=null;
                    @endphp


                    @foreach($ingredients as $ingredient)
                        <tr>
                            <td>
                                {{ $ingredient->id }}
                            </td>
                            <td>
                                {{ $ingredient->name }}
                            </td>
                            <td>
                                @foreach($receptes as $recepta)
                                    @foreach($receptesIngredients as $RecIng)
                                        @if($ingredient->id==$RecIng->ingredientid&&$recepta->name!=$anterior)
                                            <span class="label label-primary" style="font-size: larger;">
                                                {{ $recepta->name }}
                                                @php
                                                     $anterior=$recepta->name;
                                                @endphp   
                                            </span>
                                            <br>
                                        @endif                                     
                                    @endforeach
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-2"></div>
    </body>
</html>


