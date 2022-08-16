<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Servis Takip Yönetim</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url("assets/images/logo.png")?>"/>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 99;
            padding-top: 220px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: black;
        }

        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 50%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        @-webkit-keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        @keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        .close {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            padding: 2px 16px;
            background-color: #34495e;
            color: white;
        }

        .modal-body {padding: 2px 16px}
        .modal-body img{max-width: 84%;
            height:auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .modal-footer {
            padding: 2px 16px;
            background-color: #34495e;
            color: white;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = document.getElementById('myModal');

            var btn = document.getElementById("myBtn");

            var span = document.getElementsByClassName("close")[0];

            onload= function() {
                modal.style.display = "block";
            }

            span.onclick = function() {
                window.location = ("<?php echo base_url("admin/islemdurumu/")?>");
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    window.location = ("<?php echo base_url("admin/islemdurumu/")?>");
                }
            }
        });
    </script>
</head>
<body>
<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Servis Takip</h2>
        </div>
        <div class="modal-body" style="text-align: center">
            <h1>Cihazın İşlem Durumunu Giriniz!</h1>
        </div>
    </div>
</div>
</body>
</html>


