@extends('layouts.app')

@section('content')







<center>
<form action="">
  <div class="form-group">
    <input type="radio" id="ch1" name="search" value="1" onclick="Ischecked1()">Chercher par nom
    <input type="radio" id="ch2" name="search" value="2" onclick="Ischecked2()" style="margin-left: 30px;">Chercher par autres critères
  </div>
</form>
</center>


<div id="backgroundimage" class="container-fluid ">
        <div class="row d-flex justify-content-center ">
            <div class="mt-4 col-md-3 bg-light opacity-form rounded-form-home" id="h1"></div>
        </div>
    </div>
<br><br>
<form action="" class="d-inline-flex">
  <div class="form-group">
      <label for="sort">Sort by </label>
      <select id="sort" class="form-control" onchange="isSelected();">
          <option value="1" >By school/Universite name [A-Z]</option>
          <option value="2">By school/Universite name [Z-A]</option>
          <option value="3">By City name [A-Z]</option>
          <option value="4">By City name [Z-A]</option>
      </select>
  </div>
</form>
<br><br>


<script> 
  function isSelected(){
     
    if(document.getElementById('sort').options[0].selected){
    
   
      <?php
        $k=0;
                
        $ecoles=array();
        foreach($ecole as $x){
          $ecoles[$k]=$x;
          $k++;
        }
                
        function sortByName($param1, $param2) {
          return strcmp($param1->NomEcole, $param2->NomEcole);
        }
              
        usort($ecoles, "sortByName");
              
            
      ?> 
      document.getElementById('div1').innerHTML="";
      <?php
        foreach($ecoles as $x){
      ?> 
          document.getElementById('div1').innerHTML+=`    
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h3 class="my-0 fw-normal">{{ $x->NomEcole }} </h3>
              </div>
              <div class="card-body">
                  <img  height="155px"  src="{{ asset('Images/Ecoles/'. $x->PhotoEcole) }}" alt="{{ $x->NomEcole }}.{{ $x->TypeEcole }}" title="{{ $x->NomEcole }}.{{ $x->TypeEcole }}">
                  <br><br>
                  <a href="/showSchool/{{$x->id;}}" class="w-100 btn btn-lg btn-outline-info">Découvrir</a>
              </div>
            </div>
          </div>`;
      <?php
        }          
      ?>     
            
              
    }else if(document.getElementById('sort').options[1].selected){
                   
      <?php
                
        $k=0;
                
        $ecoles=array();
        foreach($ecole as $x){
          $ecoles[$k]=$x;
          $k++;
        }
                
        function sortByNameDesc($param1, $param2) {
          return strcmp($param2->NomEcole, $param1->NomEcole);
        }
              
      
        usort($ecoles, "sortByNameDesc");
              
      ?>
      document.getElementById('div1').innerHTML="";
      <?php
        foreach($ecoles as $x){
      ?> 
        document.getElementById('div1').innerHTML+=`    
        <div class="col">
          <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
              <h3 class="my-0 fw-normal">{{ $x->NomEcole }}</h3>
            </div>
            <div class="card-body">
                <img  height="155px"  src="{{ asset('Images/Ecoles/'. $x->PhotoEcole) }}" alt="{{ $x->NomEcole }}.{{ $x->TypeEcole }}" title="{{ $x->NomEcole }}.{{ $x->TypeEcole }}">
                <br><br>
                <a href="/showSchool/{{$x->id;}}" class="w-100 btn btn-lg btn-outline-info">Découvrir</a>
            </div>
          </div>
        </div>`;
      <?php
        }
      ?>     
              
    }else if(document.getElementById('sort').options[2].selected){
            
      <?php
                      
        $k=0;
                      
        $ecoles=array();
        foreach($ecole as $x){
          $ecoles[$k]=$x;
          $k++;
        }
                      
        function sortByCity($param1, $param2) {
          return strcmp($param1->VilleEcole, $param2->VilleEcole);
        }
                      
        usort($ecoles, "sortByCity");
                    
      ?>
      document.getElementById('div1').innerHTML="";
      <?php
        foreach($ecoles as $x){
      ?> 
        document.getElementById('div1').innerHTML+=`    
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h3 class="my-0 fw-normal">{{ $x->NomEcole }}</h3>
              </div>
              <div class="card-body">
                  <img  height="155px"  src="{{ asset('Images/Ecoles/'. $x->PhotoEcole) }}" alt="{{ $x->NomEcole }}.{{ $x->TypeEcole }}" title="{{ $x->NomEcole }}.{{ $x->TypeEcole }}">
                  <br><br>
                  <a href="/showSchool/{{$x->id;}}" class="w-100 btn btn-lg btn-outline-info">Découvrir</a>
              </div>
            </div>
          </div>`;
      <?php
        }
                        
      ?>     
                      
    }else if(document.getElementById('sort').options[3].selected){
            
      <?php
                      
        $k=0;
                      
        $ecoles=array();
        foreach($ecole as $x){
          $ecoles[$k]=$x;
          $k++;
        }
                      
        function sortByCityDesc($param1, $param2) {
          return strcmp($param2->VilleEcole, $param1->VilleEcole);
        }
                    
        uasort($ecoles, "sortByCityDesc");
                    
      ?>
      document.getElementById('div1').innerHTML="";
      <?php
        foreach($ecoles as $x){
      ?> 
        document.getElementById('div1').innerHTML+=`    
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h3 class="my-0 fw-normal">{{ $x->NomEcole }}</h3>
              </div>
              <div class="card-body">
                  <img  height="155px"  src="{{ asset('Images/Ecoles/'. $x->PhotoEcole) }}" alt="{{ $x->NomEcole }}.{{ $x->TypeEcole }}" title="{{ $x->NomEcole }}.{{ $x->TypeEcole }}">
                  <br><br>
                  <a href="/showSchool/{{$x->id;}}" class="w-100 btn btn-lg btn-outline-info">Découvrir</a>
              </div>
            </div>
          </div>`;
      <?php
        }             
      ?>     
                      
    }
  
  }

  window.onload=function(){
    isSelected();
  }

</script>


    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center" id="div1" >
      <!-- /////////// -->
     
      <!-- /////////// -->
    </div>
    
    
    <script>
       
      function Ischecked1(){
       if(document.getElementById("ch1").checked){
        document.getElementById('h1').innerHTML=`<form class="p-3" action="{{ route('search1') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nomE">Nom école/Univérsité/institut :</label>
                        <input class="form-control" list="NOM" name="nomE" id="nomE" required>
                        <datalist id="NOM">
                          @foreach($ecole as $x )
                            <option value="{{ $x->NomEcole }}">
                          @endforeach
                        </datalist>
                    </div>
                    <center>
                        <input type="submit" class="btn btn-primary" value="Chercher" name="chercher">
                    </center>
                </form>`;
        } 
    }
    function Ischecked2(){
       if(document.getElementById("ch2").checked){
        document.getElementById('h1').innerHTML=`<form class="p-3" action="{{ route('search2') }}" method="POST">
                      @csrf         
                      <div class="form-group">
                        <label for="typeE">Type école/Univérsité/institut :</label>
                        <select class="form-control" id="typeE" name="typeE">
                          <option value="Publique">Publique</option>
                          <option value="Privée">Privée</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sp">Spécialité :</label>
                        <select class="form-control" name="sp" id="sp" data-live-search="true"  data-show-subtext="true">
                          @foreach($specialite as $x )
                              <option value="{{ $x->id }}">{{ $x->NomSpec }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ville">Ville :</label>
                        <input class="form-control" list="villes" name="ville" id="ville"/>
                        <datalist id="villes">
                          @foreach($ville as $x )
                            <option value="{{ $x->VilleEcole }}">
                          @endforeach
                        </datalist>
                    </div><br>
                    <center>
                        <input type="submit" class="btn btn-primary" value="Chercher" name="chercher">
                    </center>
                </form>`;
                
        } 
    }

    </script>






@endsection
