<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>@yield('title')</title>
<link href="//fonts.googleapis.com/css?family=Raleway:300,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<style type="text/css">
<!--
/* Sticky footer styles
-------------------------------------------------- */
html {
    position: relative;
    min-height: 100%;
}
body {
    /* Margin bottom by footer height */
    margin-bottom: 60px;
}
h1, h2, h3, h4, h5, h6 {
    color: #333;
    font-family: 'Raleway', "Helvetica Neue", Arial, Helvetica, sans-serif;
    font-weight: 300
}


.footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    /* Set the fixed height of the footer here */
    height: 60px;
    background-color: #f5f5f5;
}
nav {
    background: #0e0e0e;
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIxJSIgc3RvcC1jb2xvcj0iIzBlMGUwZSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMzYjNiM2IiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
}
nav #mt_admin_header_logo {
    width: 16px;
    height: 16px;
    vertical-align: baseline;
    margin-right: 8px;
    margin-left: -8px;
    float:left;
}
body > .container {
    padding: 60px 15px 0;
}
.container .text-muted {
    margin: 20px 0;
}

.footer > .container {
    padding-right: 15px;
    padding-left: 15px;
}

-->
</style>
</head>

<body>
    <!-- Fixed navbar -->

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle navigation</span></button> <a class="navbar-brand" href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACHklEQVR42m2T3UtTcRyHvxdpZzszWNuFbjTzyryYJmbbfMHmdJiz5nSnAq2gQPsPMsKwiHJGySgvqi0MWtmQrusqQrzwtReDQHr1jYGhdeH1t882z8vOunjuzvOcD+f8fvTm61Ga/y3R7GYYdCssbIXp3c+TzhPnzDXeTpFauk0Kvi4TeYMi9V+zECU/OOg1InNqRBsYReCxGtDKVopM2IkmP5VR8qMDS1w5EQQKEFhGYAMBQSv34c0jL+10O2HLBkDeEgQ8CDACjIBfOzuyK996pgbUJd8ySxCQonLgWFCMy/KIKusD6hJErIvbp3+lAx1nzdwYMKb6Bi0lkQlZVqFXn8tk9oB6EJ1ccvx4u9bAU6shDvSY+eIVC99J2leGX9jGhp/bmkAhoDSUmDl4GIyCL4CzlIIDnJiu5kuDxTwUL+br8RIeiiksg/vgCAV6i1zgIVgFHOjdx+09Rew/ZeQbjyo4dMHKNU0C13oNXNussA6egAZqDplkDKANXzxW1yZs3IxV8fR6iIPn97O71chOl5ByuoVx0AFEQGnyTlj98b10NVphW9o5sza1Esz8BV+XuOnxG0srIVTV5ZInD9wrp4Vtid7/lcY05+Bpa9hEWEKVnv8FFPkQLf6RMscYNGoC7ennshFDToR8Onl+SznKhQh8RyCFgEFeql8CWaDLd8tlWX+ZHiAwrlwmbaQFEXwTvawPVCPg1gb0S/4BhTxsLG3c6AgAAAAASUVORK5CYII=" height="16" width="16" id="mt_admin_header_logo"> MapTechnica API</a>
            </div>


        </div>
    </nav><!-- Begin page content -->

    <div class="container">
        
@yield('content')

    </div>

    <footer class="footer">
        <div class="container">
            <p class="text-muted">Place sticky footer content here.</p>
        </div>
    </footer><script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous" type="text/javascript">
</script> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
</body>
</html>
