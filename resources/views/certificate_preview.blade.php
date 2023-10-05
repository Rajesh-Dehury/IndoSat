<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Preview</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter&family=Roboto&family=Ubuntu:wght@300;400&display=swap');

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        -webkit-print-color-adjust: exact !important;
    }

    body {
        font-family: 'Roboto', sans-serif;
    }

    .certificate {
        position: relative;
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
        background-color: #fff;
        border: 2px solid #c8c4c4;
    }

    .certificate img {
        max-width: 100%;
        height: auto;
    }

    .top-left {
        position: absolute;
        top: 15px;
        left: 20px;
        color: #fff;
    }

    .tp_left_text {
        font-family: 'Inter', sans-serif;
        font-size: 1.9rem;
        font-weight: bold;
        padding-bottom: 20px;
    }

    .tp_left_text2 {
        font-family: 'Inter', sans-serif;
        font-size: 1.9rem;
        font-weight: bold;
        line-height: 0;
        padding-bottom: 20px;
    }

    .tp_left_text1 {
        font-family: 'Inter', sans-serif;
        font-size: 2rem;
        font-weight: bold;
        padding-bottom: 20px;
    }

    .big-image {
        position: absolute;
        top: 8%;
        right: 7%;
        width: 170px;
        height: auto;
    }

    .form-content {
        position: absolute;
        top: 35%;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
    }

    .mid_text {
        font-weight: bold;
        font-size: 1rem;
    }

    .mid_text1 {
        font-weight: bold;
        font-size: 1.5rem;
    }

    .mid_text2 {
        font-size: 1.2rem;
    }

    .mid_text_font {
        font-weight: bold;
    }

    .bottom-right {
        position: absolute;
        bottom: 10%;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
    }

    .b_right_text1 {
        font-weight: 900;
        font-size: 1rem;
    }

    .b_right_text {
        font-weight: 500;
        font-size: 0.8rem;
    }

    .br {
        border-bottom: 2px solid #1C1C1C;
        margin: 8px;
        width: 100%;
    }

    @media print {
        @page {
            size: landscape;
        }

        .certificate {
            position: relative;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            border: 2px solid #c8c4c4;
        }

        .certificate img {
            max-width: 100%;
            height: auto;
        }

        .top-left {
            position: absolute;
            top: 15px;
            left: 20px;
            color: #fff;
        }

        .tp_left_text {
            font-family: 'Inter', sans-serif;
            font-size: 1.9rem;
            font-weight: bold;
            padding-bottom: 20px;
        }

        .tp_left_text2 {
            font-family: 'Inter', sans-serif;
            font-size: 1.9rem;
            font-weight: bold;
            line-height: 0;
            padding-bottom: 20px;
        }

        .tp_left_text1 {
            font-family: 'Inter', sans-serif;
            font-size: 2rem;
            font-weight: bold;
            padding-bottom: 20px;
        }

        .big-image {
            position: absolute;
            top: 8%;
            right: 7%;
            width: 170px;
            height: auto;
        }

        .form-content {
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }

        .mid_text {
            font-weight: bold;
            font-size: 1rem;
        }

        .mid_text1 {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .mid_text2 {
            font-size: 1.2rem;
        }

        .mid_text_font {
            font-weight: bold;
        }

        .bottom-right {
            position: absolute;
            bottom: 10%;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }

        .b_right_text1 {
            font-weight: 900;
            font-size: 1rem;
        }

        .b_right_text {
            font-weight: 500;
            font-size: 0.8rem;
        }

        .br {
            border-bottom: 2px solid #1C1C1C;
            margin: 8px;
            width: 100%;
        }
    }

    /* Mobile */
    @media (max-width: 768px) {
        .big-image {
            width: 50px;
        }

        .top-left {
            top: 10px;
            left: 10px;
        }

        .tp_left_text {
            font-size: 0.7rem;
            padding-bottom: 5px;
        }

        .tp_left_text2 {
            font-size: 0.7rem;
            padding-bottom: 5px;
        }

        .tp_left_text1 {
            font-size: 0.7rem;
            padding-bottom: 5px;
        }

        .mid_text {
            font-size: 0.5rem;
        }

        .mid_text1 {
            font-weight: bold;
            font-size: 0.7rem;
        }

        .card-body {
            padding: 2px;
        }

        .mid_text2 {
            font-size: 0.5rem;
        }

        .b_right_text1 {
            font-weight: 900;
            font-size: 0.5rem;
            margin-bottom: 1px;
        }

        .bottom-right {
            bottom: 0%;
        }

        .br {
            border-bottom: 1px solid #1C1C1C;
            margin: 3px;
        }

        .b_right_text {
            font-weight: 700;
            font-size: 0.5rem;
        }
    }

    /* Tablets */
    @media (min-width: 769px) and (max-width: 1024px) {
        .big-image {
            width: 90px;
        }

        .top-left {
            top: 15px;
            left: 15px;
        }

        .tp_left_text {
            font-size: 1.5rem;
            padding-bottom: 10px;
        }

        .tp_left_text2 {
            font-size: 1.5rem;
            padding-bottom: 10px;
        }

        .tp_left_text1 {
            font-size: 1.5rem;
            padding-bottom: 10px;
        }

        .mid_text {
            font-size: 1.2rem;
        }

        .mid_text1 {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .card-body {
            padding: 10px;
        }

        .mid_text2 {
            font-size: 0.9rem;
        }

        .b_right_text1 {
            font-weight: 900;
            font-size: 0.7rem;
            margin-bottom: 1px;
        }

        .bottom-right {
            bottom: 10%;
        }

        .br {
            border-bottom: 1px solid #1C1C1C;
            margin: 3px;
        }

        .b_right_text {
            font-weight: 700;
            font-size: 0.8rem;
        }
    }
</style>

<body>
    <div class="certificate">
        <img class="certificate-border" src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('assets/indosat/express/certificate.png')))}}" alt="Certificate Border 1">
        <div class="top-left">
            <p class="tp_left_text mb-2">LIFEVITAE</p>
            <p class="tp_left_text2 mb-2">CERTIFICATE OF</p>
            <p class="tp_left_text1 mb-5">ACHIEVEMENT</p>
        </div>
        <img class="big-image" src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('assets/indosat/express/badges_teal_2.png')))}}" alt="Big Image">
        <div class="form-content">
            <h2 class="mid_text">This is to certify that</h2>
            <div class="card-body">
                <h1 id="recipientName" class="mid_text1">{{$certificate->user->name}}</h1>
                <p class="mid_text2">
                    for attending <span id="courseName" class="mid_text_font">{{$certificate->event->name}}</span> on
                    <span id="completionDate" class="mid_text_font">{{$certificate->event->date}}</span>, led by guest
                    speaker <span id="SpeakrName" class="mid_text_font">{{$certificate->event->speaker_name}}</span>
                    conducted by LifeVitae.
                </p>
            </div>
        </div>
        <div class="bottom-right">
            <p class="b_right_text1 fw-bold">Priya Sengupta</p>
            <div class="br"></div>
            <p class="b_right_text">Founder & CEO, LifeVitae</p>
        </div>
    </div>
</body>

</html>