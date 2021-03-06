<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
        
        <head>

        <title>Database Setup</title>
        <link href='http://fonts.googleapis.com/css?family=Share:700' rel='stylesheet' type='text/css'>
        <style type="text/css">
                body {
                        background: #DDD;
                }
                .hidden {
                        display: none;
                }
                #results {
                        margin: 0;
                        padding: 0;
                }
                #results li
                {
                        font-family: 'Share', arial;
                        list-style: none;
                        font-size: 5em;
                        margin: 0;
                        padding: 0;
                        text-align: center;
                        margin-top: 250px;
                        color: #666;
                }
                #loader {
                        text-align: center;
                }
                .link {
                        text-align: center;
                }
                .link a {
                        font-family: 'Share', arial;
                        color: #888;
                        font-weight: bold;
                }
                .link a:hover {
                        color: #aaa;                        
                }
                .circle {
                        background-color: rgba(0,0,0,0);
                        border:5px solid rgba(102,102,102,0.9);
                        opacity:.9;
                        border-right:5px solid rgba(0,0,0,0);
                        border-left:5px solid rgba(0,0,0,0);
                        border-radius:50px;
                        box-shadow: 0 0 35px #666;
                        width:50px;
                        height:50px;
                        margin:0 auto;
                        -moz-animation:spinPulse 1s infinite ease-in-out;
                        -webkit-animation:spinPulse 1s infinite linear;
                }
                .circle1 {
                        background-color: rgba(0,0,0,0);
                        border:5px solid rgba(102,102,102,0.9);
                        opacity:.9;
                        border-left:5px solid rgba(0,0,0,0);
                        border-right:5px solid rgba(0,0,0,0);
                        border-radius:50px;
                        box-shadow: 0 0 15px #666; 
                        width:30px;
                        height:30px;
                        margin:0 auto;
                        position:relative;
                        top:-50px;
                        -moz-animation:spinoffPulse 1s infinite linear;
                        -webkit-animation:spinoffPulse 1s infinite linear;
                }
                @-moz-keyframes spinPulse {
                        0% { -moz-transform:rotate(160deg); opacity:0; box-shadow:0 0 1px #666;}
                        50% { -moz-transform:rotate(145deg); opacity:1; }
                        100% { -moz-transform:rotate(-320deg); opacity:0; }
                }
                @-moz-keyframes spinoffPulse {
                        0% { -moz-transform:rotate(0deg); }
                        100% { -moz-transform:rotate(360deg);  }
                }
                @-webkit-keyframes spinPulse {
                        0% { -webkit-transform:rotate(160deg); opacity:0; box-shadow:0 0 1px #666; }
                        50% { -webkit-transform:rotate(145deg); opacity:1;}
                        100% { -webkit-transform:rotate(-320deg); opacity:0; }
                }
                @-webkit-keyframes spinoffPulse {
                        0% { -webkit-transform:rotate(0deg); }
                        100% { -webkit-transform:rotate(360deg); }
                }
        </style>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript">
                function showSetup(element)
                {
                        $(element).fadeIn('slow', function() {
                                if($(element).next().length > 0)
                                {
                                        setTimeout(function() {
                                                $(element).fadeOut('slow', function() {
                                                        showSetup($(element).next());
                                                });
                                        }, 1000);
                                }
                                else
                                {

                                        $('#loader').fadeOut('fast', function() {
                                                $(this).after('<p class="link hidden"><a href="'+document.URL+'/update">Run Latest Updates</a></p>');
                                                $(".link").fadeIn('slow');
                                        });
                                }
                        });
                }
                $(document).ready(function() {
                        $('#loader').fadeIn('slow');
                        showSetup($('#results').children('li:first-child'));
                });
        </script>
        </head>

        <body>
                <ul id='results'>
                        <li class='hidden'>Baughss Database Setup</li>
                        <?php echo $list; ?>
                </ul>

        <div id="loader" class="hidden"><div class="circle"></div>
<div class="circle1"></div></div>

        </body>

</html>