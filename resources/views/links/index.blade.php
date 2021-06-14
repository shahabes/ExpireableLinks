@extends("home")

@section("media-list")
    ابتدا، مشتری رو انتخاب کنید یا اگر در لیست زیر موجود نیست، برای ایجاد یک مشتری جدید،
    <a href="{{ route("customer.index") }}" class="add_customer">
        اینجا
    </a>
    کلیک کنید.
    <br>
    <br>
    <div style="display: flex; ">

        <div class="list-group myCustomerGroup" style="flex: 1; margin-right: 10px; height: 400px; overflow-y: scroll;">
            <h4>
                مشتریان
            </h4>
            @foreach($customers as $customer)
                <a href="#" data-userId="{{$customer->id}}" class="list-group-item list-group-item-action">
                    {{ $customer->name }}
                </a>
            @endforeach
        </div>


        <div class="list-group myMediaGroup " style="flex: 1; margin-left: 10px; height: 400px; overflow-y: scroll;">
            <h4>
                فایل ها
            </h4>
            @foreach($media as $medium)
                <a href="#" data-mediaId="{{$medium->id}}" class="list-group-item list-group-item-action">
                    {{ $medium->title}}
                </a>
            @endforeach
        </div>
    </div>
    <br>
    <button class="btn btn-primary addMediaToCustomer" style="width: 100%">فایل را برای مشتری ثبت کن</button>

    <div class="toast" data-delay="5000" style="position:absolute; left: 20px; top: 20px;" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img class="rounded mr-2 bg-success" style="width: 30px; height: 30px;">
            <strong class="mr-auto">Sitra shop</strong>
            <small>همین حالا</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            با موفقیت اضافه شد، بعدی رو انجام بده:)
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        $(document).ready(function () {
            $(".myCustomerGroup a").click(function () {
                $(".myCustomerGroup a").removeClass("active");
                $(this).addClass("active");

            });

            $(".myMediaGroup a").click(function () {
                $(".myMediaGroup a").removeClass("active");
                $(this).addClass("active");

            });

            $(".addMediaToCustomer").click(function () {
                $.post('{{ route("links.create") }}', {
                    user_id: $(".myCustomerGroup a.active").attr("data-userId"),
                    media_id: $(".myMediaGroup a.active").attr("data-mediaId"),
                    _token: "{{ csrf_token() }}"
                }, function (data) {

                    if (data.message === "the link is added.") {
                        $('.toast').toast("show");
                    }
                }
            );
        });
        })
        ;
    </script>
@endsection
