@extends('admin.layouts.layout')

@section('blog')
    active
@endsection

@section('content')
    <!-- MAIN -->
    <main>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3> Mentor ma'lumotlari</h3>
                    <a class="create__btn" href="{{ route('admin.blog.index') }}"> <i class='bx bx-arrow-back'></i>Qaytish</a>

                </div>

            </div>


            <div class="table-data">
                <div class="order">

                    <table>
                        <tbody>

                            <tr>
                                <td>
                                    <p>Sarvlavha uz : </p>
                                </td>
                                <td><b>{{ $blog->title }}</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Ma'lumot : </p>
                                </td>
                                <td><b>{!! $blog->description !!}</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Rasm : </p>
                                </td>
                                <td><img src="/images/{{ $blog->img }}" alt="" width="100px"></td>
                            </tr>

                            <tr>
                                <td>
                                    <p>Vaqt : </p>
                                </td>
                                <td><b>{{ $blog->created_at }}</b></td>
                            </tr>


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>

    <!-- MAIN -->
@endsection
