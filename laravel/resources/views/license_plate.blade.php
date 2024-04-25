@extends('layouts.common')

@section('title')
  Bien so xe
@endsection

@section('content')
  <form method="GET" action="{{ route('biensoxe.search') }}">
    <div>
      <input type="search" id="search" name="search"/>
      <select name="type" id="type">
        <option value="4">4 số</option>
        <option value="5">5 số</option>
      </select>
      <button>Tìm kiếm</button>
    </div>
  </form>

  @if (!empty($data))
    {!! $data->content !!}
  @endif
@endsection
