<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ishu">
    <meta name="author" content="Scott Wilcox <scott@dor.ky>">
    <title>Ishu</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="/ishu.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="cover-container">
            <div class="masthead clearfix">
                <div class="inner">
                    <h3 class="masthead-brand">&nbsp;</h3>
                    <nav>
                        <ul class="nav masthead-nav">
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="inner cover">
                <h1 class="cover-heading">iOS App Beta User Signup</h1>
                <p class="lead">
                    If you're interested in signing up for the <a href="http://twitter.com/tweeklyfm" target="_blank">@tweeklyfm</a> iOS app beta testing scheme, complete the form below. </p>
                <p>You'll need an iPhone running iOS7 or later, a Twitter account and a Last.fm account.</p>
                <br>
                <form class="form-horizontal" action="/" method="post">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                    <?php
                    if (count($errors) > 0)
                    {
                        echo '<div class="alert alert-danger">';
                        /*
                        foreach ($errors->all() as $error)
                        {
                            echo $error.'<br>';
                        }
                        */
                        echo "<p>Please complete <strong>all</strong> fields and check your email address is valid.</p>";
                        echo '</div>';
                    }
                    ?>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name_first">First Name</label>
                            <div class="col-md-3">
                                <input id="name_first" name="name_first" type="text" value="{{{ Input::old("name_first") }}}" placeholder="First Name" class="form-control">
                            </div>
                            <label class="col-md-2 control-label" for="name_last">Last Name</label>
                            <div class="col-md-4">
                                <input id="name_last" name="name_last" type="text" value="{{{ Input::old("name_last") }}}" placeholder="Last Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="twitter">Twitter</label>
                            <div class="col-md-3">
                                <input id="twitter" name="twitter" type="text" value="{{{ Input::old("twitter") }}}" placeholder="@username" class="form-control">
                            </div>
                            <label class="col-md-2 control-label" for="lastfm">Last.fm</label>
                            <div class="col-md-4">
                                <input id="lastfm" name="lastfm" type="text" value="{{{ Input::old("lastfm") }}}" placeholder="music-lover-2014" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="uuid">Device UUID</label>
                            <div class="col-md-6">
                                <input id="uuid" name="uuid" type="text" value="{{{ Input::old("uuid") }}}" placeholder="E621E1F8-C36C-495A-93FC-0C247A3E6E5F" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <div class="margin-top-7">
                                    <a href="http://whatsmyudid.com/" target="_blank">How to find your UUID</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email">Email Address</label>
                            <div class="col-md-9">
                                <input id="email" name="email" type="text" value="{{{ Input::old("email") }}}" placeholder="email@address.com" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="message">Your message</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="message" value="{{{ Input::old("message") }}}" name="message" placeholder="What would make you a good tester?" rows="5"></textarea>
                            </div>
                        </div>
                    </fieldset>
                    <br>
                    <p class="lead">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        <button type="reset" class="btn btn-danger btn-lg">Reset</button>
                    </p>
                </form>
            </div>

            <div class="mastfoot">
                <div class="inner">
                    <p>Powered by <a href="http://github.com/ssx/ishu">ishu</a>, by <a href="https://twitter.com/ssx">@ssx</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>
</html>
