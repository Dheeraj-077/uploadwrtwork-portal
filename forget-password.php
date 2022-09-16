
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/styles.css" rel="stylesheet" />
    <link href="./style.css" rel="stylesheet" />
    <link href="./css/bootstrap.min.css" rel="stylesheet" />
    <title>Vector Art USA</title>
</head>
<body>
    <div class="background-blue h-100">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100 bg-white">
                <!-- <div class="col-md-6 login-image bg-white">
                    <img src="./images/login.png" alt="login image" class="img-fluid">
                </div> -->
                <div class="col-md-6 py-4 ">
                    <div class="logo-wrap text-center mb-4">
                        <img src="./images/logo.png" alt="logo" class="img-fluid">
                    </div>
                    <form action="forget-process.php" method="post"> 
                        <?php if(isset($_GET['sent'])) {?>
                            <div class="form-group">
                                <p class="error text-danger"><?php echo "Reset link has been sent to your registered email Id. kindly check your inbox. It can take 2 to 3 minutes to deliver in your mail box." ?></p>
                            </div>
                        <?php } ?>
                        <?php if(isset($_GET['servererr'])) { ?>
                            <div class="form-group">
                                <p class="error text-danger"><?php echo "The server failed to send the message. Please try again later. " ?></p>
                            </div>
                        <?php } ?>
                        <?php if(isset($_GET['something_wrong'])) { ?>
                            <div class="form-group">
                                <p class="error text-danger"><?php echo "Something went wrong" ?></p>
                            </div>
                        <?php } ?>
                        
                        <?php if(isset($_GET['error'])) { ?>
                            <div class="form-group">
                                <p class="error text-danger"><?php echo $_GET['error'] ?></p>
                            </div>
                        <?php } ?>
                        <?php if(!isset($_GET['sent'])) { ?>
                        <div class="form-group mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-paper-plane"></i></span></div>
                                <input type="email" class="form-control" name="email" placeholder="Email Address"  title="Valid Email id">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary btn-lg" name="forget">Reset Link</button>
                        </div>
                        <?php }?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./js/all.min.js"></script>
</html>