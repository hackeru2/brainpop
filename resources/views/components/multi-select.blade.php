
 
<div class="form-group col-sm-6">
  <input type="hidden" id="studentsInput" name="students" >
  {!! Form::label('Students', 'Students:') !!}
      <select class="multi">
        <option value="" disabled >Select Students</option>
        @foreach ($students as $student)
        <option value={{$student->id}}>{{$student->full_name}}</option>
 
          @endforeach
        </select>


</div>

@section('multi-select')
   
    <script src={{asset('multiSelect.js-master\js\multiselect.js')}}></script>
    <script>
     
      let chosen  = {{$periodStudents->pluck('id') }} 
      let chosenFullNames  =" {{ $periodStudents->pluck('full_name')->implode(', ') }} "
      
        console.log('chosenFullNames', chosenFullNames)
      let onlyOnce = true;
      // console.log('$(".multi ")', $(".multi option:selected").text())
      $(() => {
       
          //alert(chosen)
        // let chosen = $(".multi__inner").text('JavaScript') 
        let text = chosenFullNames.trim() ? chosenFullNames : "No Students Selected yet..." 
          console.log($(".multi__inner").text(text));
         $("button.multi__display").on("click" , function(){

          if(!onlyOnce) return console.log("bye")
            onlyOnce = false;

         console.log('this.', $(this)
          .next().
          children().children()
          .each( function( key , item){

            if(chosen.includes(  $(item).data('value') ))
             item.click()
            //console.log( $(item).text())
            console.log( $(item).data('value'))
            //console.log('key', key)
         }))
         })
          
      })

    </script>

@endsection