@extends('admin.layouts.layout')


@section('blog')
    active
@endsection

@section('content')
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <!-- MAIN -->
        <main>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Yangilik qo'shish</h3>
                        <a class="create__btn" href="{{route('admin.blog.index')}}"> <i class='bx bx-arrow-back'></i>Qaytish</a>

                    </div>

                    <form class="create__inputs" action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <strong> Sarvlavha uz :</strong>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                     <!--    @error('title') {{ $message }} @enderror<br> -->

                     <strong> Ma'lumot uz :</strong>
                        <textarea class="ckeditor form-control" name="description" value="{{ old('description') }}">{{ old('description') }}</textarea>
                        @error('description') {{ $message }} @enderror<br>

                        <strong> Rasm(png yoki jpg) :</strong>
                        <input type="file" name="img" class="form-control"><br>


                        <input type="submit" value="Qo`shish">

                    </form>
                </div>

            </div>
        </main>
        <!-- MAIN -->

        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
               $('.ckeditor').ckeditor();
            });
        </script>

@endsection
