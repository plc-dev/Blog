@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')

  {!! Html::style('css/select2.css') !!}

  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

@section('content')

@section('content')

  <div class="container">
    <div class="row">
      {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-12">
          {{ Form::label('title', 'Title:') }}
          {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

          {{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
          {{ Form::text('slug', null, ['class' => 'form-control']) }}

          {{ Form::label('category_id', "Category:", ["class" => 'form-spacing-top']) }}
          {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

          {{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
          {{ Form::select('tags[]', $tags, null, ['class' => 'form-control', 'select2-multi', 'multiple' => 'multiple']) }}

          {{ Form::label('featured_image', 'Update featured image:') }}
          {{ Form::file('featured_image') }}

          {{ Form::label('body', 'Body:', ["class" => 'form-spacing-top']) }}
          {{ Form::textarea('body', null, ['id' => 'editor', "class" => 'form-control']) }}

        </div>

    </div> <!-- end of header .row-->
    {!! link_to_route('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block' )) !!}

    {{ method_field('PUT') }} {{ Form::submit('Save Changes', ["class" => 'btn btn-success btn-block']) }}
  </div> <!-- end of container .container-->
      {!! Form::close() !!}

      @section('scripts')

        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <script>
          var quill = new Quill('#editor', {
            theme: 'snow'
          });
        </script>

          {!! Html::script('js/select2.min.js') !!}
          <script type="text/javascript">
              $('.select2-multi').select2();
              $('.select2-multi').select2().val({!! json_encode($post->tags()->pluck('tag_id')->toArray()) !!}).trigger('change');
          </script>

      @endsection

@endsection
