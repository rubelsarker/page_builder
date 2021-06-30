<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>KEditor - Kademi Content Editor</title>
    <link rel="stylesheet" type="text/css" href="{{url('')}}/keditor/plugins/bootstrap-3.4.1/css/bootstrap.min.css" data-type="keditor-style" />
    <link rel="stylesheet" type="text/css" href="{{url('')}}/keditor/plugins/font-awesome-4.7.0/css/font-awesome.min.css" data-type="keditor-style" />
    <!-- Start of KEditor styles -->
    <link rel="stylesheet" type="text/css" href="{{url('')}}/keditor/dist/css/keditor.css" data-type="keditor-style" />
    <link rel="stylesheet" type="text/css" href="{{url('')}}/keditor/dist/css/keditor-components.css" data-type="keditor-style" />
    <!-- End of KEditor styles -->
    <link rel="stylesheet" type="text/css" href="{{url('')}}/keditor/plugins/code-prettify/src/prettify.css" />
    <link rel="stylesheet" type="text/css" href="{{url('')}}/keditor/css/examples.css" />
</head>

<body>
<div data-keditor="html">
    <div id="content-area">
        {!! $page->body !!}
    </div>
</div>

<script type="text/javascript" src="{{url('')}}/keditor/plugins/jquery-1.11.3/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="{{url('')}}/keditor/plugins/bootstrap-3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('')}}/keditor/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{url('')}}/keditor/plugins/ckeditor-4.11.4/ckeditor.js"></script>
<script type="text/javascript" src="{{url('')}}/keditor/plugins/formBuilder-2.5.3/form-builder.min.js"></script>
<script type="text/javascript" src="{{url('')}}/keditor/plugins/formBuilder-2.5.3/form-render.min.js"></script>
<!-- Start of KEditor scripts -->
<script type="text/javascript" src="{{url('')}}/keditor/dist/js/keditor.js"></script>
<script type="text/javascript" src="{{url('')}}/keditor/dist/js/keditor-components.js"></script>
<!-- End of KEditor scripts -->
<script type="text/javascript" src="{{url('')}}/keditor/plugins/code-prettify/src/prettify.js"></script>
<script type="text/javascript" src="{{url('')}}/keditor/plugins/js-beautify-1.7.5/js/lib/beautify.js"></script>
<script type="text/javascript" src="{{url('')}}/keditor/plugins/js-beautify-1.7.5/js/lib/beautify-html.js"></script>
{{--<script type="text/javascript" src="{{url('')}}/keditor/js/examples.js"></script>--}}
<script type="text/javascript" data-keditor="script">
    $(function () {
        $('#content-area').keditor({
            snippetsUrl: '{{url("")}}/keditor/snippets/snippets.blade.php',
            title: 'Design {{$page->title}} Page',
            onSave: function (content) {
                //var content = $('#content-area').keditor('getContent');
                var url = '{{ route("pages.update", ":id") }}';
                url = url.replace(':id', {{$page->id}});
                $.ajax({
                    url: url,
                    type: "PUT",
                    data: {
                        'body': content,
                        _token: "{{csrf_token()}}"
                    },
                    success: function (data) {
                        var url = '{{ route("pages.show", ":id") }}';
                        url = url.replace(':id', {{$page->id}});
                        if(data.code == 200){
                         window.location = url
                        }
                    }
                });
                console.log(content)
            },
        });
    });
</script>
</body>
</html>
