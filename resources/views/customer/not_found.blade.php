<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فروشگاه سیترا</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
          integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/fontiran.css")}}">

</head>
<style>
    body, html {
        margin: 0;
        padding: 0;
    }

    body {
        background-size: contain;
        background: url({{ asset('img/1.png')}});
        background-attachment: fixed;
    }

    h2 {
        font-family: anjoman;
        width: 100%;
        font-size: 26px;
        font-weight: 800;
        text-align: right;
        color: #484848;
        direction: rtl;
    }

    h2 span {
        font-weight: 900;
        color: #4a205f;
    }

    .header-caption {
        font-family: anjoman;
        text-align: right;
        line-height: 28px;
        direction: rtl;
        color: #5d5d5d;
    }

    .header-caption span {
        color: #1f1f1f;
        border-bottom: 1px dashed #5d5d5d;
    }

    .files-title {
        font-family: anjoman;
        width: 100%;
        font-weight: 600;
        text-align: center;
        color: #484848;
        direction: rtl;

    }

    .files {
        height: 300px;
        overflow-y: scroll;
    }

    .file-article {
        display: flex;
        flex-direction: row-reverse;
        align-items: center;
        justify-content: space-between;
        width: 400px;
        margin: auto;
        padding: 20px;
        border-bottom: 2px dashed #eee;
    }

    .file-article:hover {
        text-decoration: none;
        background: #eee;
    }

    .file-article:hover .download {
        background: #282828;
        color: #eee;
    }

    .file-article .number {
        flex: 0;
        font-size: 30px;
        color: #3c3c3c;
        font-family: anjoman;
        font-weight: 500;
    }

    .file-article .title {
        font-family: anjoman;
        flex: 5;
        text-align: right;
        font-weight: 500;
        color: #3c3c3c;
        margin: 0 20px;
    }

    .file-article .download {
        flex: 0;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: #eee;
        color: #282828;
        font-size: 30px;
        line-height: 80px;
        display: block;
        flex-basis: 80px;
        text-align: center;
    }
</style>
<body>

<div class="container">
    <div class="row mt-5 p-5 shadow rounded bg-white">
        <h2 class="col-12 mb-4">
            کاربر عزیز، فایل شما یافت نشد.
        </h2>
        <p class="header-caption col-12">
            فایلی که شما درخواست دانلود آن را دارید، موجود نیست و یا قبلا از این لینک، استفاده کرده اید.
            <span>
            در صورتی که برای بار اول، موفق به دریافت فایل نشده اید، با پشتیبانی تماس بگیرید.
            </span>
        </p>

        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf"
        crossorigin="anonymous"></script>

</body>
</html>
