@extends('layouts.app')

@section('content')
    <form action="{{ route('articles.store') }}" method="post">
        
        <label>Title</label>
        <input type="text" name="title" >
        <label>Content</label>
        <input type="text" name="content" >

        <button type="submit">OK</button>
    </form>
@endsection
