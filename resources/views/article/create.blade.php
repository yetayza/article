@extends('layout')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection

@section('content')

    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>
    @if($errors->any())
        <div class="alert alert-danger">
                <strong>Opps!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <form method="POST" action="/articles">
            @csrf

                <div class="field">
                    <label class="label" for="title">Title</label>

                    <div class="control">
                        <input class="input" type="text" name="title" id="title">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="expert">Expert</label>

                    <div class="control">
                        <textarea class="input" name="expert" id="expert"></textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>

                    <div class="control">
                        <textarea class="input" name="body" id="body"></textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Tags</label>

                    <div class="select is-multiple control">
                        <select name="tags[]" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection