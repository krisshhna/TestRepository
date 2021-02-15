
  <x-header title="Form Page" />

  <div class="row">
    <div class="col-md-6 col-lg-6 col-xs-12"> 
      <h3 id="button1">Peoples</h3>
      <label for="peo">Search by Name</label>
      <input type="text" name="peo" id="peo" onInput="onChangeValues(event)">
      <br/>
      <p id="message"></p>
      <br/>
    </div>

    <div class="col-md-6 col-lg-6 col-xs-12">
      <h3>Films</h3>
      <label for="film">Search by Film Name</label>
      <input type="text" name="film" id="film" onInput="onChangeFilm(event)">
      <br/>
      <p id="message_film"></p>
      <br/>
    </div>

  </div>


  <div id="peoplesData">
  <form method="post" id="peoplesInformation">

     


      <div class="row">
        <div class="col-md-6 col-lg-6 col-xs-12">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Name</th>
                <td class="p_t_name"><input type="text" readonly name="p_name" id="p_name"></td>
              </tr>
              <tr>
                <th scope="row">Gender</th>
                <td class="p_t_gender">  <input type="text" readonly name="p_gender" id="p_gender"></td>
              </tr>
              <tr>
                <th scope="row">Birth Year</th>
                <td class="p_t_dob"><input type="text" readonly name="p_dob" id="p_dob"></td>
              </tr>
              <tr>
                <th scope="row">Skin Color</th>
                <td class="p_t_skincolor"><input type="text" readonly name="p_skincolor" id="p_skincolor"></td>
              </tr>
              <tr>
                <th scope="row">Hair Color</th>
                <td class="p_t_haircolor">  <input type="text" readonly name="p_haircolor" id="p_haircolor"></td>
              </tr>
              <tr>
                <th scope="row">Eye Color</th>
                <td class="p_t_eyecolor"> <input type="text" readonly name="p_eyecolor" id="p_eyecolor"></td>
              </tr>
              <tr>
                <th scope="row">Mass</th>
                <td class="p_t_mass">    <input type="text" readonly name="p_mass" id="p_mass"></td>
              </tr>
              <tr>
                <th scope="row">height</th>
                <td class="p_t_height"><input type="text" readonly name="p_height" id="p_height"></td>
              </tr>
              <tr>
                <th scope="row">No of Films</th>
                <td class="p_t_nooffilms"><input type="text" readonly name="p_no_of_films" id="p_no_of_films"></td>
              </tr>
              
              <input type="hidden" name="p_peoplenumber" id="p_peoplenumber">
      <input type="hidden" name="p_films_list" id="p_films_list">
      <input type="hidden" name="p_starships" id="p_starships">
      <input type="hidden" name="p_vehicles" id="p_vehicles">
            </tbody>
          </table>
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12"></div>
      </div>

      <input type="hidden" name="_token" value = " {{ csrf_token() }} " >
 


    <button type="button" class="btn btn-primary btn-sm" onclick="submit_peoplesData()">
      submit
    </button>



    </form>
  </div>

  <div id="filmsData">
  <form method="post" id="filmsInformation">

     


<div class="row">
  <div class="col-md-6 col-lg-6 col-xs-12">
    <table class="table">
      <tbody>
        <tr>
          <th scope="row">Title</th>
          <td><input type="text" readonly name="f_title" id="f_title"></td>
        </tr>
        <tr>
          <th scope="row">Episode id</th>
          <td>  <input type="text" readonly name="f_episodeid" id="f_episodeid"></td>
        </tr>
        <tr>
          <th scope="row">Opening Crawl</th>
          <td><input type="text" readonly name="f_openingcrawl" id="f_openingcrawl"></td>
        </tr>
        <tr>
          <th scope="row">Director</th>
          <td><input type="text" readonly name="f_director" id="f_director"></td>
        </tr>
        <tr>
          <th scope="row">Producer</th>
          <td>  <input type="text" readonly name="f_producer" id="f_producer"></td>
        </tr>
        <tr>
          <th scope="row">Release Date</th>
          <td> <input type="text" readonly name="f_releasedate" id="f_releasedate"></td>
        </tr>
        
        <input type="hidden" name="p_peoplenumber" id="p_peoplenumber">
        <input type="hidden" name="f_noofcharacters" id="f_noofcharacters">
        <input type="hidden" name="f_no" id="f_no">

      </tbody>
    </table>
  </div>
  <div class="col-md-6 col-lg-6 col-xs-12"></div>
</div>

<input type="hidden" name="_token" value = " {{ csrf_token() }} " >



<button type="button" class="btn btn-primary btn-sm" onclick="submit_filmsData()">
submit
</button>



</form>
  </div>


<hr>

<div class="row">
  <div class="col-md-12 col-lg-12 col-xs-12">
    <h3 class="text-center">Peoples information</h3>

    <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="row">Name</th>
            <th scope="row">Gender</th>
            <th scope="row">Skin Color</th>
            <th scope="row">Hair Color</th>
            <th scope="row">Eye Color</th>
            <th scope="row">Height</th>
            <th scope="row">No of films</th>
          </tr>
        </thead>
        <tbody id="peoplebody">
        </tbody>
    </table>
  </div>
</div>

<hr>

<div class="row">
<div class="col-md-12 col-lg-12 col-xs-12">
    <h3 class="text-center">Films Information</h3>

    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Title</th>
          <th>Episode id</th>
          <th>Director</th>
          <th>Producer</th>
          <th>No of Characters</th>
        </tr>
      </thead>

      <tbody id="filmBody">
      </tbody>
    </table>
  </div>
</div>



<script>

  $().ready(function(){
    $('#peoplesData').hide();
    $('#filmsData').hide();

    checkallRecords();
  })

  function onChangeValues(event)
  {
    var values = event.target.value;
    if(event.target.value != '')
    {
      myFunction(values);
    }else{
      
      $('#peoplesData').hide();
      $('#filmsData').hide();
    }
   
  }



  function myFunction(id)
  {
    $.ajax({
      type:'get',
      url:'https://swapi.dev/api/people/?search='+id,
      dataType:'json',
      success:function(data)
      {
          if(data['count'] != 0)
          {
              data = data['results'][0];
              $('#filmsData').hide();
              $('#peoplesData').show();

              $('#p_name').val(data['name']);
              $('#p_skincolor').val(data['skin_color']);
              $('#p_mass').val(data['mass']);
              $('#p_gender').val(data['gender']);
              $('#p_haircolor').val(data['hair_color']);
              $('#p_height').val(data['height']);
              $('#p_eyecolor').val(data['eye_color']);
              $('#p_dob').val(data['birth_year']);
              $('#p_no_of_films').val(data['films'].length);
              $('#p_peoplenumber').val(data['url']);
              $('#p_starships').val(data['starships'].length);
              $('#p_vehicles').val(data['vehicles'].length);
              $('#p_films_list').val(data['films']);
            
          }else{
            $('#peoplesData').hide();
            $('#filmsData').hide();
          }
      }
    })
  }


  // $.ajaxSetup({
  //   headers:{'X-CSRF-TOKEN':$('meta[name="csrf-toen"]').attr('content')}
  // });

  function submit_peoplesData()
  {
    $.ajax({
      type:'post',
      url:'submitPeoplesInformation',
      data:$('#peoplesInformation').serialize(),
      dataType:'json',
      success:function(data)
      {
        if(data['status']==true)
        {
            checkallRecords();
        }
        $('#message').html(data['message']);
        $('#peoplesData').hide();
        $('#filmsData').hide();
      }
    });
  }

  function checkallRecords()
  {
    $.ajax({
      type:'get',
      url:'/getAllPeoples',
      dataType:'json',
      success:function(data)
      {
          var peoplehtml = "";


          if(data['peopleInfo'].length > 0)
          {
            for(var a=0;a<data['peopleInfo'].length;a++)
            {
              peoplehtml +="<tr><td>"+data['peopleInfo'][a]['p_name']+"</td><td>"+data['peopleInfo'][a]['p_gender']+"</td><td>"+data['peopleInfo'][a]['p_skincolor']+"</td><td>"+data['peopleInfo'][a]['p_haircolor']+"</td><td>"+data['peopleInfo'][a]['p_eyecolor']+"</td><td>"+data['peopleInfo'][a]['p_height']+"</td><td>"+data['peopleInfo'][a]['p_no_of_films']+"</td></tr>";
            }

            $('#peoplebody').html(peoplehtml);
          
          }else{
            peoplehtml = "";
          }


          var filmHtml = "";

          if(data['filmInfo'].length > 0)
          {

            for(var f =0; f<data['filmInfo'].length; f++)
            {
              filmHtml += "<tr><td>"+data['filmInfo'][f]['f_title']+"</td><td>"+data['filmInfo'][f]['f_episodeid']+"</td><td>"+data['filmInfo'][f]['f_director']+"</td><td>"+data['filmInfo'][f]['f_producer']+"</td><td>"+data['filmInfo'][f]['f_noofcharacters']+"</td></tr>";
            }

            $('#filmBody').html(filmHtml);
          }else{
            filmHtml = "";
          }
         
      }
    });
  }



  // film script

  function onChangeFilm(event)
  {
    var values = event.target.value;
    if(event.target.value != '')
    {
      myFunction1(values);
    }else{
      $('#peoplesData').hide();
      $('#filmsData').hide();
    }
   
  }

  
  function myFunction1(id)
  {
    $.ajax({
      type:'get',
      url:'https://swapi.dev/api/films/?search='+id,
      dataType:'json',
      success:function(data)
      {
          if(data['count'] != 0)
          {
              data = data['results'][0];
              $('#filmsData').show();
              $('#peoplesData').hide();

              $('#f_title').val(data['title']);
              $('#f_episodeid').val(data['episode_id']);
              $('#f_openingcrawl').val(data['opening_crawl']);
              $('#f_director').val(data['director']);
              $('#f_producer').val(data['producer']);
              $('#f_releasedate').val(data['release_date']);
              $('#f_noofcharacters').val(data['characters'].length);
              $('#f_no').val(data['url']);
            
          }else{
            $('#peoplesData').hide();
            $('#filmsData').hide();
          }
      }
    })
  }

  function submit_filmsData()
  {
    $.ajax({
      type:'post',
      url:'submitFilmsInformation',
      data:$('#filmsInformation').serialize(),
      dataType:'json',
      success:function(data)
      {
        if(data['status']==true)
        {
            checkallRecords();
        }
        $('#message_film').html(data['message']);
        $('#peoplesData').hide();
        $('#filmsData').hide();
      }
    });
  }
</script>

  <x-footer />