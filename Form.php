<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Common Gateway Interface</title>
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--CSS-->
    <link href="Form.css" rel="stylesheet">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"> </script>
    <!--Main Div-->
    <div class="my-5 text-center">
        <!--Heading-->
        <h1 class="text-center"><u><strong>Perl Tutorial</strong></u></h1>
        <form action="/cgi-bin/submit-cgi.pl" method="Post" class="my-5" enctype="multipart/form-data" id="infoForm">
            <!--First Name-->
            <div class="row">
                <div class="col-5 col-lg-6">
                    <h3 class="text-end">Frist Name:</h3>
                </div>
                <div class="col-2 col-lg-1">
                    <input class="mx-3" type="text" name="fname" /><br>
                </div>
            </div>

            <!--Last Name-->
            <div class="row my-2">
                <div class="col-5 col-lg-6">
                    <h3 class="text-end">Last Name:</h3>
                </div>
                <div class="col-2 col-lg-1">
                    <input class="mx-3" type="text" name="lname" /><br>
                </div>
            </div>

            <!--College-->
            <div class="row my-2">
                <div class="col-5 col-lg-6">
                    <h3 class="text-end">College:</h3>
                </div>
                <div class="col-2 col-lg-1">
                    <input class="mx-3" type="text" name="college" /><br>
                </div>
            </div>

            <!--Field-->
            <div class="row my-2">
                <div class="col-5 col-lg-6">
                    <h3 class="text-end">Field:</h3>
                </div>
                <div class="col-2 col-lg-1">
                    <input class="mx-3" type="text" name="field" /><br>
                </div>
            </div>

            <!--Year of Passing-->
            <div class="row my-2">
                <div class="col-5 col-lg-6">
                    <h3 class="text-end">Year of Passing:</h3>
                </div>
                <div class="col-2 col-lg-1">
                    <input class="mx-3" type="text" name="year" /><br>
                </div>
            </div>

            <!--Picture-->
            <div class="row my-2">
                <div class="col-5 col-lg-6">
                    <h3 class="text-end">Your Picture:</h3>
                </div>
                <div class="col-2 col-lg-1">
                    <input onchange="fileInputChange()" class="mx-3" type="file" name="photo" id="Pic" /><br>
                </div>
            </div>

            <!--Submit Button-->
            <input type="submit" type="button" class="btn btn-success btn-lg my-3" name="submit">
    </div>
    <!--JS-->
    <script>
        //Validate File
        function fileInputChange() {
            const fileInputBox = document.getElementById("Pic");
            const file = document.getElementById("Pic").files.item(0);
            const fileType = file['type'];
            const validTypes = ['image/jpeg', 'image/png'];
            //Only if jpg or png
            if (!validTypes.includes(fileType)) {
                alert("Please Upload jpg or png only.");
                fileInputBox.value = "";
            }
            else {
                //Check its size which should <=1MB
                const size = Math.round(((fileInputBox.files.item(0).size) / 1024) / 1024);
                if (size > 1) {
                    alert("Please Select Image of size less than or equal to 1MB");
                    fileInputBox.value = "";
                }
            }

            //on Submitting form
            $('#infoForm').submit( () => {
                var file_data = $('#Pic').prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data);
                //Calling php with POst method to upload picture to uploads folder on server
                //We have to use this as otherwise form action was happening before picutre was able to upload
                $.ajax({
                    method: 'post',
                    type: 'post',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    url: 'index.php',
                    success: function (data) {
                        //now can proceed
                        return true;
                    }
                });
            });
        }
    </script>
</body>

</html>
