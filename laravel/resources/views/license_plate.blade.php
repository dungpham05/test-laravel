@extends('layouts.common')

@section('title')
  Bien so xe
@endsection

@section('content')
  <form method="GET" action="{{ route('biensoxe.search') }}">
    <div>
      <input type="search" id="search" name="search"/>
      <button>Tìm kiếm</button>
    </div>
  </form>

  @if (!empty($data))
    {!! $data->content !!}
  @endif
@endsection
