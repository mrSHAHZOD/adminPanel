@extends('admin.layouts.layout')

@section('news')
active
@endsection

@section('content')
<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
            @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
            @endif
          <div class="card">
            <div class="card-header">
              <h4>news</h4>
              <a href="{{ route('admin.news.create') }}" class="btn btn-primary" style="position:absolute; right:50;">Create</a>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Title</th>
                      <th>Content</th>
                      <th>Rasimlar</th>
                      <th>Vaqt</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (count($news) == 0) 
					    <tr>
					        <td colspan="5" class="h5 text-center text-muted">Ma'lumot qo'shilmagan</td>
					    </tr>
					@endif

                    @foreach($news as $news)
                      <tr>
                        <td>
                          {{ ++$loop->index }}
                        </td>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->content }}</td>
                         <td>
                          <img alt="img" src="#" width="59">
                        </td>
                        <td><b>{{ $news->created_at }}</b></td>
                        <td>
                        <form action="#" method="POST">
                            @csrf
						    @method('DELETE')
                          <a href="{{ route('admin.news.show', $news->id) }}" class="btn btn-info"><ion-icon class="fas fa-info-circle"></ion-icon></a>
                          <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-primary"><ion-icon class="far fa-edit"></ion-icon></a>
                          <button class="btn btn-danger" onclick="return confirm('Rostdan o`chirmoqchimisiz ?')"><ion-icon class="fas fa-times"></ion-icon></button>
                        </form>
                        </td>

                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
