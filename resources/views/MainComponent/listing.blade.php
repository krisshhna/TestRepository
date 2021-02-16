<x-header />

<div class="row">
  <div class="col-md-3 col-lg-3 col-xs-12">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Peoples</label>
    <select class="form-control" id="peopleInfo">
    <option value="0">Select</option>
      @foreach($people as $peo)
        <option value="{{$peo['p_id']}}" {{$peo['p_id']==$url['people']?'selected':''}}>{{$peo['p_name']}}</option>
      @endforeach


    </select>
  </div>
  </div>

  <div class="col-md-3 col-lg-3 col-xs-12">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Films</label>
    <select class="form-control" id="filmInfo">
    <option value="0"> Select</option>
    @foreach($film as $fil)
      <option value="{{$fil['f_id']}}" {{$fil['f_id']==$url['film']?'selected':''}}>{{$fil['f_title']}}</option>
    @endforeach
    </select>
  </div>
  </div>

  <div class="col-md-6 col-lg-6 col-xs-12">
  </div>
</div>

<a class="btn btn-sm btn-default" href="listing?film=0&people=0">Refresh</a>

<h1>Listing Grid</h1>


<div class="row">
@foreach($f_info as $f)

  <div class="col-md-3 col-lg-3 col-xs-12">
    <div class="card">
    <div class="card-body">
        <h5 class="card-title">{{$f->f_title}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Release Date : {{$f->f_releasedate}}</h6>
        <p class="card-text">Director : {{$f->f_director}} </p>
        <p class="card-text">Producer : {{$f->f_producer}} </p>
        <p class="card-text">Number of peoples  : {{$f->f_noofcharacters}} </p>
        
      </div>
    </div>
  </div>
  @endforeach

  @foreach($p_info as $p)
  <div class="col-md-3 col-lg-3 col-xs-12">
    <div class="card" >
      <div class="card-body">
        <h5 class="card-title">{{$p->p_name}} ({{$p->p_dob}})</h5>
        <h6 class="card-subtitle mb-2 text-muted">Gender : {{$p->p_gender}}</h6>
        <p class="card-text">Details </p>
        <table class="table table-bordered" style="background-color:white">
          <tr>
            <th>Skin Color</th>
            <td>{{$p->p_skincolor}}</td>
          </tr>
          <tr>
            <th>Hair Color</th>
            <td>{{$p->p_haircolor}}</td>
          </tr>
          <tr>
            <th>Eye Color</th>
            <td>{{$p->p_eyecolor}}</td>
          </tr>

        </table>
        <h6 class="card-subtitle mb-2 text-muted">Number of Vehicles : {{$p->p_vehicles}}</h6>
      </div>
    </div>
  </div>
  @endforeach

</div>

<script>

$('#peopleInfo').on('change', function()
{
  if(this.value != 0)
  {
    window.location.href = "listing?film=0&people="+this.value;
  }
});

$('#filmInfo').on('change', function()
{
  if(this.value !=0)
  {
    window.location.href="listing?film="+this.value+"&people=0";
  }
});
</script>

<style>

body {
  font-family: sans-serif;
   margin: 0;
   background: #f2f2f2;
}

h1{
  text-align:center;
}

h5{
  font-weight:600 !important;
}

.card{
  background-color:#c3e1e3;
  padding:10px;
}

th{
  font-size:12px;
}

</style>
<x-footer />