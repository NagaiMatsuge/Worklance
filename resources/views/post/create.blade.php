@extends('layouts.navAndFooter')
@section('content')
      <div class="col-lg-8">
          <h6 class="title">Добавить проект</h6>
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <form action="/post" method="POST" autocomplete="on">
            @csrf
              <input name="name" class="input-style" type="text" placeholder="Название проекта">

              <div id="editor">
                  <h3>Детали проекта</h3>
              </div>
              
              <textarea name="about" class="input-style" type="text" placeholder="Референсы"></textarea>
              <textarea name="description" required rows="7" class="input-style" placeholder="Project details"></textarea>
                <select name="skills[]" class="selectpicker select-input multiselect1" multiple data-live-search="true">
                  @foreach ($skills as $skill)
                    <option>{{ $skill->name }}</option>
                  @endforeach
                </select>
              <input name="reference" class="input-style" type="text" placeholder="Имя пользователя в Telegram">
              <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
              <div class="d-flex justify-content-end">
                  <button class="back-btn mr-3">Назад</button>
                  <button href="{{ url()->previous()}}" class="active-btn">Сохранить</button>
              </div>
          </form>
      </div>
  <script>
    initSample();
</script>
@endsection