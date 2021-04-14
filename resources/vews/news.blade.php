
@extends('layouts.app') 

@section('head1', 'Новости')

@section('head2', 'Редактирование')

@section('form-header')
  <form action="{{ route('news-form-insert') }}" method="post" id="forms" name="forms"> 
@endsection

@section('fields')

  <input type="hidden" id="recid" name="recid" value="">


  <div class="form-group" style="width: 400px">
    <lable for="theme_news">Тема новости</lable>
    <input type="text" name="theme_news" placeholder="Тема новости" id="theme_news" class="form-control">
  </div>

  <div class="form-group" style="awidth: 400px;">
    <lable for="text_news">Текст новости</lable>
    <textarea type="text" name="text_news" placeholder="Текст новости" id="text_news" class="form-control" cols="50" rows="7"></textarea>
  </div>

  <div class="form-group" style="width: 200px;">
    <lable for="date_news">Дата новости</lable>
    <input type="date" name="date_news" placeholder="Дата новости" id="date_news" class="form-control">
  </div>
@endsection

@section('newsRow')

@foreach ($data as $newsRow)

  <div class="wp-block property list">
    <div class="wp-block-body"  id="news_{{$newsRow->recid}}">
      <div><small style="float: right;" id='ct_date_{{$newsRow->recid}}'>{{date('d.m.Y', strtotime($newsRow->date_news))}}</small></div>
        <div class="wp-block-content">
          <h4 class="content-title" id='ct_theme_{{$newsRow->recid}}'>{{$newsRow->theme_news}}</h4>
          <div class="description" id='ct_text_{{$newsRow->recid}}'>{{$newsRow->text_news}}</div>
        </div>
        <div style="padding-bottom: 15px"><small style="float: right;">#recid : <span id='ct_recid_{{$newsRow->recid}}'>{{$newsRow->recid}}</span></small></div>
      </div>
  </div>

@endforeach

  <script>
    var old_this
    $(".wp-block-body").click(function() {

      var idr = this.id
      idrs = this.id.substr(5)
      recid.value = $('#ct_recid_'+idrs).html()
      theme_news.value = $('#ct_theme_'+idrs).html()
      text_news.value = $('#ct_text_'+idrs).html()

          var date_1 = $('#ct_date_'+idrs).html()
          var dd_1 = date_1.substr(0,2)
          var mm_1 = date_1.substr(3,2)
          var yy_1 = date_1.substr(6)

      date_news.value = yy_1+"-"+mm_1+"-"+dd_1;

      
      if (old_this) old_this.style.border = "1px solid transparent"
      this.style.border = "1px solid #3498DB"
      old_this = this

    });


    $(".wp-block-body").mouseover(function() {
      if (this.style.borderColor == "rgb(52, 152, 219)") return
      this.style.borderColor = "rgb(165, 165, 165)"
    });

    $(".wp-block-body").mouseout(function() {
      if (this.style.borderColor == "rgb(52, 152, 219)") return
      this.style.borderColor = "transparent"
    });

  
</script>

@endsection

@section('buttonSubmitJS')

  <script>
    function f_submit(type) {

        if (type == "new") {
            forms.action = "{{ route('news-form-insert') }}"
            forms.submit();
        }
        if (type == "edit") {
            forms.action = "{{ route('news-form-update') }}"
            forms.submit();
        }
        if (type == "del") {
            document.location.href= "{{ route('news-form-delete', '_') }}" + recid.value
        }
        
    }
    
  </script>

@endsection

