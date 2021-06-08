<title>laravel异步上传多图</title>
<link href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script><script src="https://cdn.staticfile.org/jquery.form/4.2.2/jquery.form.min.js"></script><style type="text/css">
        input[type=file] {
            display: inline;
        }
        #image_preview {
            padding: 10px;
        }
        #image_preview img {
            width: 200px;
            padding: 5px;
        }
    </style>
<div class="container mt-5">

    <h3>laravel5.7异步上传多图</h3>
    <form action="{{ url('admin/image-upload-post') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" id="uploadFile" name="uploadFile[]" multiple><input type="submit" class="btn btn-success btn-sm" name="submitImage" value="上传">
</form>
    <br><div id="image_preview"></div>
</div>

<script type="text/javascript">
    $("#uploadFile").change(function () {
        $('#image_preview').html("");
        let total_file = document.getElementById("uploadFile").files.length;
        for (let i = 0; i < total_file; i++) {
            $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");
        }
    });
    // $('form').ajaxForm(function () {
    //     //alert("上传成功");
    // });
</script>