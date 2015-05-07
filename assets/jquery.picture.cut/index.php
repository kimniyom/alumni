
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <TITLE>PictureCut a jquery image crop plugin on Bootstrap theme</TITLE>
    <META NAME="DESCRIPTION" CONTENT="PictureCut is a jquery plugin that handles images in a very friendly and simple way">
    <META NAME="ABSTRACT" CONTENT="PictureCut is a jquery plugin that handles images">
    <META NAME="KEYWORDS" CONTENT="PictureCut,jQuery Image Crop,jQuery upload image,ajax upload file">
    <META NAME="ROBOT" CONTENT="All">
    <META NAME="RATING" CONTENT="general">
    <META NAME="DISTRIBUTION" CONTENT="global">
    <META NAME="LANGUAGE" CONTENT="EN">
    
    <link rel="stylesheet" href="dependencies/bootstrap-3.2.0/css/bootstrap.min.css"> <!--for bootstrap theme-->    
    <link rel="stylesheet" href="demo_assets/google-code-prettify/prettify.css">

    <script src="dependencies/jquery/jquery-1.11.1.min.js"></script>    
    <script src="dependencies/bootstrap-3.2.0/js/bootstrap.min.js"></script><!--for bootstrap theme-->
    <script src="dependencies/jquery-ui-1.11.1.custom/jquery-ui.min.js"></script>
    <script src="demo_assets/google-code-prettify/prettify.js"></script>
    
    
    <script src="src/jquery.picture.cut.js"></script>

    <link rel="stylesheet" href="demo_assets/demo.css">

    <style>
        .container_form{            
            
            
        }
        .container_code{            
            
            
            text-align: left;
        }           
        pre{
            text-align: left;
            font-size: 11px;
        }

        .container_code .table{
            font-size: 12px;
        }
        .row{
            padding: 1em;
        }
    </style>
</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body>

       <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="/">jQuery PictureCut</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">                                    
                    <li>
                        <a class="page-scroll" href="/example_bootstrap.php">On Bootstrap</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/docs/">Docs</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="http://tuyoshi.com.br" target="_blank">Developer</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="http://feedbacknow.tuyoshi.com.br/" style="color:#009900"><i class="fa fa-lightbulb-o">&nbsp;</i>New Project jQuery feedbackNow</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
    </nav>

    <h3 class="title">Samples with bootstrap</h3>
    <!-- Columns are always 50% wide, on mobile and desktop -->
    <div class="row">

          <div class="col-sm-6">
                    

                        <div class="container_form clearfix">
                            <div class="panel panel-default">
                                <div class="panel-heading">Sign up</div>
                                <div class="panel-body">
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter name" required>                 
                                        </div>

                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>                 
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>                 
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <div id="container_photo"></div>
                                        </div>

                                        
                                        <br>
                                        <button type="submit" class="btn btn-default">Register</button>
                                    </form>

                                </div>
                            </div>


                                                
                        </div>
                
           </div>
            <div class="col-sm-6">
                    

                        <div class="container_code clearfix">
                            <div class="panel panel-default">
                                <div class="panel-heading">Basic Source</div>
                                <div class="panel-body">
<pre class="prettyprint linenums">
    
$("#container_photo").PictureCut({                    
    InputOfImageDirectory       : "image",
    PluginFolderOnServer        : "/jquery.picture.cut/",
    FolderOnServer              : "/uploads/",    
    EnableCrop                  : true,
    CropWindowStyle             : "Bootstrap",              
});

</pre>


                                    <table class="table">
                                        <tbody>                                            
                                            <tr>
                                                <td><strong>InputOfImageDirectory</strong></td>
                                                <td>
                                                    The plugin will automatically generate a hidden input type that will receive the full address (url) of the image, this parameter will be your name, This parameter takes a string.
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td><strong>PluginFolderOnServer</strong></td>
                                                <td>
                                                    This parameter will receive the directory of the plugin folder from the root folder, This parameter takes a string.
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><strong>FolderOnServer</strong></td>
                                                <td>
                                                    This parameter will receive the folder that will store the image, it is important to know that the directory defined here need to have write permissions on the server, This parameter takes a string.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>EnableCrop</strong></td>
                                                <td>
                                                    Activate clipping, This parameter takes a boolean value.
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><strong>CropWindowStyle</strong></td>
                                                <td>
                                                    Theme used.
                                                </td>
                                            </tr>

                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        
            </div>
            <!-- <div class="col-xs-2"></div> -->
    </div>

    <hr>

    <div class="row">
          <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Simple upload and Treatment size</div>
                        <div class="panel-body">

                                <div class="form-group">
                                    <label>Size treated to 100 kbytes</label>
                                    <div id="simple_upload"></div>
                                </div>
                                
                                <div id="simple_upload_result"></div>
                        </div>
                    </div>                
          </div>


          <div class="col-sm-6">
                
                            <div class="panel panel-default">
                                <div class="panel-heading">Source</div>
                                <div class="panel-body">
<pre class="prettyprint linenums">
    
$(&quot;#simple_upload&quot;).PictureCut({                    
    InputOfImageDirectory       : &quot;image&quot;,
    PluginFolderOnServer        : &quot;/jquery.picture.cut/&quot;,
    FolderOnServer              : &quot;/uploads/&quot;,                
    EnableCrop                  : false,                
    EnableMaximumSize           : true,
    MaximumSize                 : 100, // 100 kbytes
    CropWindowStyle             : &quot;Bootstrap&quot;,
    UploadedCallback: function(data){                    
        $(&quot;#simple_upload_result&quot;).html(&quot;&quot;)
            .append(&quot;&lt;strong&gt;Image:&lt;/strong&gt;&lt;br&gt;&quot;+data.options.FolderOnServer+data.currentFileName)
                .append(&quot;&lt;br&gt;&quot;)
                    .append(&quot;&lt;strong&gt;Size:&lt;/strong&gt;&lt;br&gt;&quot;+Math.round((data.currentFileSize/1024))+&quot; kbytes&quot;);
    }
});

</pre>
                                </div>
                            </div>
              
          </div>
<!--           <div class="col-xs-2">
              
          </div> -->
    </div>
    <br>
    <br>
    <h3 class="title">More themes</h3>
    <div class="row" style="padding-left: 2em">
        <a href="example_jquery_ui.php" role="button">jQueryUi Theme</a><br>
        <a href="example_pop_style.php" role="button">jQueryUi Personalised Theme</a>
    </div>





    





    <script>
        $(document).ready(function(){

           $("#container_photo").PictureCut({                                
                InputOfImageDirectory       : "image",
                PluginFolderOnServer        : "/jquery.picture.cut/",
                FolderOnServer              : "/jquery.picture.cut/uploads/",                
                EnableCrop                  : true,
                CropWindowStyle             : "Bootstrap",
                Default                     : ["jpg","png","gif"],
                UploadedCallback: function(data){                    
                    alert(data.currentFileName);
                }                 
            });

            $("#simple_upload").PictureCut({                                
                InputOfImageDirectory       : "image",
                PluginFolderOnServer        : "/jquery.picture.cut/",
                FolderOnServer              : "/jquery.picture.cut/uploads/",                
                EnableCrop                  : false,                
                EnableMaximumSize           : true,
                MaximumSize                 : 100, // 100 kbytes
                CropWindowStyle             : "Bootstrap",
                UploadedCallback: function(data){                    
                    $("#simple_upload_result").html("")
                                                .append("<strong>Image:</strong><br>"+data.options.FolderOnServer+data.currentFileName)
                                                    .append("<br>")
                                                        .append("<strong>Size:</strong><br>"+Math.round((data.currentFileSize/1024))+" kbytes");
                    console.log(JSON.stringify(data));
                }
            });
            

            prettyPrint();
        })
    </script>
    
     <div class="footer">
   <hr />
   <p>Copyright &copy; 2014 PictureCut</p>
 </div>
    


    
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54530508-2', 'auto');
  ga('send', 'pageview');

</script>   
</body>

</html>

