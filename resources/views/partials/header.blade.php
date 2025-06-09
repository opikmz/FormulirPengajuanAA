<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Formulir Pengajuan BMT Artha Amanah</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('asset')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="{{asset('asset')}}/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        @media print {
            .card {}

            #btn {
                visibility: hidden;
            }
        }
    </style>
    <style>
        .image-hover-container {
            position: relative;
            width: fit-content;
            display: inline-block;
        }

        .image-hover-container img {
            transition: 0.3s ease;
            display: block;
        }

        .image-hover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0);
            /* awalnya transparan */
            color: white;
            font-size: 1rem
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: 0.3s ease;
        }

        .image-hover-container:hover img {
            filter: brightness(70%);
        }

        .image-hover-container:hover .image-hover-overlay {
            opacity: 1;
            background-color: rgba(0, 0, 0, 0.4);
            /* muncul gelap + teks */
        }
    </style>
    <style>
    thead {
        margin-bottom: 0% !important;
    }
    tbody {
        margin-bottom: 0% !important;
    }
</style>
</head>
