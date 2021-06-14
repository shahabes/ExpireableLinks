@extends('home')

@section('media-list')

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
               aria-selected="true">مشتریان فعال</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
               aria-selected="false">تمام مشتریان</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
               aria-selected="false">اضافه کردن مشتری</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3 style="text-align: right;">
                لیست مشتریان فعال
            </h3>
            <hr>
            @foreach($active_customers as $customer)
                <article style="direction: rtl; text-align: right; font-size: 18px !important; color: black">
                    <p style="margin: 0">
                        <a href="{{ url("/") }}/{{ Crypt::encryptString($customer->id) }}" target="_blank" style="font-size: 18px; color: black;padding: 0">
                            {{ $customer->name }}
                        </a>
                    </p>
                    <div>
                        <a href="">
                    <span class="material-icons" style="font-size: 16px; color: black; margin: 0">
                        create
                    </span>
                        </a>
                        &nbsp;
                        &nbsp;
                        <a href="">
                    <span class="material-icons" style="font-size: 16px; color: black; ">
                        delete
                    </span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <h3 style="text-align: right;">لیست مشتریان</h3>
            <hr>
            @foreach($customers as $customer)
                <article style="direction: rtl; text-align: right; font-size: 18px !important; color: black">
                    <p style="margin: 0">
                        <a href="" style="font-size: 18px; color: black;padding: 0">
                            {{ $customer->name }}
                        </a>
                    </p>
                    <div>
                        <a href="">
                    <span class="material-icons" style="font-size: 16px; color: black; margin: 0">
                        create
                    </span>
                        </a>
                        &nbsp;
                        &nbsp;
                        <a href="">
                    <span class="material-icons" style="font-size: 16px; color: black; ">
                        delete
                    </span>
                        </a>
                    </div>
                </article>
            @endforeach

        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

            <form action="{{ route("customer.add") }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="customer_name">نام مشتری را وارد کنید:</label>
                    <input type="text" name="name" class="form-control" id="customer_name"
                           aria-describedby="emailHelp" placeholder="شهاب اسکندری">
                </div>
                <div class="form-group">
                    <label for="customer_email">ایمیل مشتری را وارد کنید:</label>
                    <input type="email" name="email" class="form-control" id="customer_email"
                           aria-describedby="emailHelp" placeholder="shahabeskandary16@gmail.com">
                </div>
                <div class="form-group">
                    <label for="customer_phone">تلفن مشتری را وارد کنید:</label>
                    <input type="text" name="phone" class="form-control" id="customer_phone"
                           aria-describedby="emailHelp" placeholder="09032845538">
                </div>
                <div class="form-group">
                    <label for="customer_insta">آدرس پیج اینستاگرام مشتری را وارد کنید:</label>
                    <input type="text" name="instagram" class="form-control" id="customer_insta"
                           aria-describedby="emailHelp" placeholder="shahab.es">
                </div>
                <div class="form-group">
                    <label for="customer_more">اطلاعات بیشتر مشتری را وارد کنید:</label>
                    <textarea  name="more" class="form-control" id="customer_more"
                               aria-describedby="emailHelp" placeholder="هر گونه اطلاعات بیشتر"></textarea>
                </div>
                <input type="submit" value="اضافه کردن مشتری" class="btn btn-primary w-100 d-block">
            </form>

        </div>
    </div>



{{--    <div class="modal modalAddMedia fade" id="exampleModal" tabindex="-1" role="dialog"--}}
{{--         aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog bd-example-modal-lg" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">Add Media</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form action="test" class="myform">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="file_title">تیتر فایل را وارد کنید:</label>--}}
{{--                            <input type="text" name="title" class="form-control" id="file_title"--}}
{{--                                   aria-describedby="emailHelp" placeholder="آموزش فتوشاپ قسمت اول">--}}
{{--                        </div>--}}
{{--                        <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="file_more">توضیحات بیشتر را وارد کنید:</label>--}}
{{--                            <textarea type="text" name="more" rows="5" class="form-control" id="file_more"--}}
{{--                                      aria-describedby="emailHelp" placeholder="هر توضیحی در مورد فایل...">--}}
{{--                            </textarea>--}}
{{--                        </div>--}}
{{--                        <div id="myDrop" style="" class="dropzone">--}}
{{--                            <div class="dz-default dz-message">--}}
{{--                                drop the video file here--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    <button type="submit" id="submit_add_new_media" class="btn btn-primary">upload</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@stop

@section("scripts")
    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function () {
            $("#addMediaModal").click(function (e) {
                e.preventDefault();
                $(".modalAddMedia").modal();
            });
        });
    </script>
@endsection
