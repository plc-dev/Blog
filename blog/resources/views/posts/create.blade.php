@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

  {!! Html::style('css/parsley.css') !!}
  {!! Html::style('css/select2.css') !!}
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

@section('content')

  <div class="row">
      <div class="col-md-8 offset-md-2">
          <h1>Create New Post</h1>
          <hr>

          {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}
              {{ Form::label('title', "Title: ") }}
              {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength'=>'255')) }}

              {{ Form::label('slug', 'Slug: ') }}
              {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

              {{ Form::label('category_id', 'Category:') }}
              <select class="form-control" name="category_id">

                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

              </select>

              {{ Form::label('tags', 'Tags:') }}
              <select class="form-control select2-multi" name="tags[]" multiple="multiple">

                @foreach($tags as $tag)
                  <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach

              </select>

              {{ Form::label('featured_image', 'Upload featured image:') }}
              {{ Form::file('featured_image') }}

              {{ Form::label('body', "Post Body: ") }}
              {{ Form::textarea('body', null, array('id' => 'editor', 'class' => 'form-control')) }}

              {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}
          {!! Form::close() !!}

      </div>
  </div>

@endsection


@section('scripts')

  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

  <script>
    var quill = new Quill('#editor', {
      theme: 'snow'
    });
  </script>

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2({
          tags:true,
          tokenSeparators: [',', '']
        });
    </script>

@endsection
