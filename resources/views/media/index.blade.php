@extends('home')

@section('media-list')

    <section>
        @foreach($media as $currentMedia)
        <article style="direction: rtl; text-align: right; font-size: 18px !important; color: black">
            <p style="margin: 0">
                <a href="" style="font-size: 18px; color: black;padding: 0">
                    {{ $currentMedia->title }}
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
    </section>

    <div class="modal modalAddMedia fade" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog bd-example-modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Media</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="test" class="myform">
                        <div class="form-group">
                            <label for="file_title">تیتر فایل را وارد کنید:</label>
                            <input type="text" name="title" class="form-control" id="file_title"
                                   aria-describedby="emailHelp" placeholder="آموزش فتوشاپ قسمت اول">
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="file_more">توضیحات بیشتر را وارد کنید:</label>
                            <textarea type="text" name="more" rows="5" class="form-control" id="file_more"
                                      aria-describedby="emailHelp" placeholder="هر توضیحی در مورد فایل...">
                            </textarea>
                        </div>
                        <div id="myDrop" style="" class="dropzone">
                            <div class="dz-default dz-message">
                                drop the video file here
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit_add_new_media" class="btn btn-primary">upload</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section("scripts")
    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function () {
            $("#addMediaModal").click(function (e) {
                e.preventDefault();
                $(".modalAddMedia").modal();
            });


            var myDropzone = new Dropzone("div#myDrop", {
            url: "{{route("media.add")}}",
                autoProcessQueue: false,
                queuecomplete: (file, response) => {
                    console.log(response);
                    window.location.reload();
                },

                init: function () {

                    var myDropzone = this;

                    // Update selector to match your button
                    $("#submit_add_new_media").click(function (e) {
                        e.preventDefault();
                        myDropzone.processQueue();
                    });

                    this.on('sending', function (file, xhr, formData) {
                        // Append all form inputs to the formData Dropzone will POST
                        var data = $('.myform').serializeArray();
                        $.each(data, function (key, el) {
                            formData.append(el.name, el.value);
                        });
                    });
                }
            });

        });
    </script>
@endsection
