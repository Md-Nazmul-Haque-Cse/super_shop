<!-- CORE PLUGINS-->
<script src="{{asset('/admin-assets')}}/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('/admin-assets')}}/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="{{asset('/admin-assets')}}/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('/admin-assets')}}/assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="{{asset('/admin-assets')}}/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="{{asset('/admin-assets')}}/assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
<script src="{{asset('/admin-assets')}}/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
<script src="{{asset('/admin-assets')}}/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="{{asset('/admin-assets')}}/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
<script src="{{asset('/admin-assets')}}/assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
<script src="{{asset('/admin-assets')}}/assets/vendors/select2/dist/js/select2.full.min.js" type="text/javascript"></script>

<script src="{{asset('/admin-assets')}}/assets/vendors/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="{{asset('/admin-assets')}}/assets/vendors/ckeditor/samples/js/sample.js" type="text/javascript"></script>
<!--Multiple Image Plugin -->

<!-- CORE SCRIPTS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('/admin-assets')}}/assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
<!--CkEditor-->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!--map-->
{{--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu1r9NHKUdnA1F2p1LbC11qUNb0vShG1M&callback=initMap"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="{{asset('/admin-assets')}}/assets/js/app.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script type="text/javascript">

    $(function() {
        $('#example-table').DataTable({
            pageLength: 10,
            //"ajax": './assets/demo/data/table_data.json',
            /*"columns": [
                { "data": "name" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "start_date" },
                { "data": "salary" }
            ]*/
        });
    })
</script>
<script>
    $(document).ready(function () {
        @yield('toast')
    })
</script>
<!-- PAGE LEVEL SCRIPTS-->
{{--<script type="text/javascript">--}}
{{--    $(function() {--}}
{{--        $('#summernote').summernote();--}}
{{--        $('#summernote_air').summernote({--}}
{{--            airMode: true--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
<!--summernote-->
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
        // $('.summernote').summernote();
    });
</script>
<!--Ck Editor -->
<script>
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );
    // initSample();
</script>
<!-- Sub Category select -->
<script>
    $(document).on('change', '#categoryId', function () {
        var categoryId = $(this).val();
        $.ajax({
            method : 'GET',
            url : '{{ url('/get-sub-category-by-id') }}',
            data : {id: categoryId},
            dataType : 'json',
            success: function (res) {
                // console.log(res);
                var option = '';
                option += '<option value="" disabled selected> -- Select Sub category Name -- </option>';
                $.each(res, function (Key, value) {
                    option += '<option value="'+value.id+'">'+value.name+'</option>';
                });
                $('#subCategoryId').empty().append(option);
            },
            error: function (e) {
                console.log(e);
            }
        });
    });
</script>


<!-- subimage -->
<style>
    input[type="file"] {
        display: block;
    }
    .imageThumb {
        /*max-height: 75px;*/
        height: 70px;
        width: 80px;
        /*border: 2px solid;*/
        padding: 1px;
        cursor: pointer;
    }
    .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
    }
    .remove {
        display: block;
        background: red;
        /*border: 1px solid black;*/
        color: white;
        text-align: center;
        cursor: pointer;
    }
    .remove:hover {
        background: deepskyblue;
        /*background: white;*/
        color: white;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
            $("#files").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                            "<br/><span class=\"remove\">&times;</span>" +
                            // "<br/><span class=\"remove\">Remove image</span>" +
                            "</span>").insertAfter("#files");
                        $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                        });

                        // Old code here
                        /*$("<img></img>", {
                          class: "imageThumb",
                          src: e.target.result,
                          title: file.name + " | Click to remove"
                        }).insertAfter("#files").click(function(){$(this).remove();});*/

                    });
                    fileReader.readAsDataURL(f);
                }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });
</script>

