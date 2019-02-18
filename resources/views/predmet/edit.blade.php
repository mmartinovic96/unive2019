@extends('adminlte::page')

@section('title', 'Unive predmet uredi')
@section('content_header')
<h1>Uredi predmet</h1>
@stop


@section('content')
 <?php
    //dd($predmet);
    ?>

<form method="POST" action="/predmets/{{ $predmet->id }}">  
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
            <label for="id"> *id:</label>
            {{$predmet->id}}<br>
        <label for="kratpred"> Kratica predmeta:</label>
        <input maxlength="8" type="text" name="kratpred"
               value="{{ $predmet->kratpred }}"><br>
        
        <label for="nazpred"> Naziv predmeta*:</label>
        <input maxlength="60" type="text" name="nazpred" required="true"
               value="{{ $predmet->nazpred }}"><br>
        
        <label for="siforgjed"> Sifra organizacijske jedinice:</label>
        <input min="100000" max="100020" type="number" name="siforgjed"
               value="{{ $predmet->siforgjed }}"><br>
        
          <label for="upisanostud"> Upisano studenata:</label>
        <input min="0" max="100" type="number" name="upisanostud"
               value="{{ $predmet->upisanostud }}"><br>
        
          <label for="brojsatitjedno"> Broj sati tjedno:</label>
        <input min="1" max="25" type="number" name="brojsatitjedno"
               value="{{ $predmet->brojsatitjedno }}"><br>
        
         
    </div>
    <div class="form-group">
        <input type="submit" onclick="ConfirmDelete()" name="uredi_predmet_sbm" value="Uredi predmet">
    </div>
   
</form>    

@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')<script>
    function Conform_Delete()
    {
       return conform("Are You Sure Want to Delete?");
    }
</script>
<script> console.log('Hi!');</script>
@stop

