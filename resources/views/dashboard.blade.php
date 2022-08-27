<section class="py-2 bg-dark">
    <a href="{{ url('/dashboard') }}" class="btn btn-outline text-white">Dashboard</a>
    <a class="btn btn-outline text-white float-right"  href="" onclick="event.preventDefault();document.getElementById('logoutForm').submit()"><i class="fa fa-power-off"></i>Logout</a>
    <form action="{{ route('logout') }}" method="POST" id="logoutForm">
        @csrf
    </form>
</section>

<!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('/admin-assets')}}/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('/admin-assets')}}/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{asset('/admin-assets')}}/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{asset('/admin-assets')}}/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <!--tostar-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!---Data Table-->
    <link href="{{asset('/admin-assets')}}/assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <!---CK Editor-->
    <script src="{{asset('/admin-assets')}}/assets/vendors/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css" type="text/javascript"></script>
    <script src="{{asset('/admin-assets')}}/assets/vendors/ckeditor/samples/css/samples.css" type="text/javascript"></script>

    <link href="{{asset('/admin-assets')}}/assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{ Auth::user()->profile_photo_url }}" width="45px"/>
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ Auth::user()->name }}</div>
                <small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{ route('dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">Category</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="">Create</a>
                    </li>
                    <li>
                        <a href="">Manage</a>
                    </li>
                </ul>
            </li>


        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->


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
    <!-- CORE SCRIPTS-->
    <!--tostar-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--Data Table-->
    <script src="{{asset('/admin-assets')}}/assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>

    <!---Ck Editor-->
    <script src="{{asset('/admin-assets')}}/assets/vendors/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="{{asset('/admin-assets')}}/assets/vendors/ckeditor/samples/js/sample.js" type="text/javascript"></script>


    <script src="{{asset('/admin-assets')}}/assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->

    <script src="{{asset('/admin-assets')}}/assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            @yield('toast')
        })
    </script>
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
        $(document).on('change', '#CategoryId', function (){
            var categoryId = $(this).val();
            $.ajax({
                method : 'GET',
                url: '{{ url('/get-sub-category-by-category-id')}}',
                data : { id : categoryId },
                dataType : 'json',
                success:function (res)
                {
                    var option = '';
                    option += '<option value="" disabled selected>--Select Subcategory Name</option>';
                    $.each(res, function (key, value){
                        option += '<option value="'+value.id+'">'+value.name+'</option>'
                    });
                    $('#subCategoryId').empty().append(option);
                },
                error:function (e)
                {
                    console.log(e);
                }
            });
        });

    </script>


    <!--ck Editor--->
    <script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
        // initSample();
    </script>

    <!---Sub Image--->
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


