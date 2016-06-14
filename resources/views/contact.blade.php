@extends('template.main')

@section('title', 'Contacto')

@section('content')

<br><br><br><br>
<!-- Contact Form - START -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm background">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header"><i class="fa fa-envelope-o bigicon"></i> Contactanos</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="name" type="text" placeholder="Nombre Completo" class="form-control">
                            </div>
                        </div>                      

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" placeholder="E-Mail" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" placeholder="Telefono" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" name="message" placeholder="Ingresa un comentario..." rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center right">
                                <button type="submit" class="btn btn-success btn-md"><i class="fa fa-paper-plane"></i> Send</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br><br><br>
<style>
    .header {
        color: #000000;
        font-size: 27px;
        padding: 10px;
    }

    .bigicon {
        font-size: 35px;
        color: #666669;
    }

    .background{
        background-color: #F2EBEB;
    }

    .right{
        right:233px;
    }

</style>

<!-- Contact Form - END -->



@endsection