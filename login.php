<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <style>
        .toggle-password {
            float: right;
            cursor: pointer;
            margin-right: 10px;
            margin-top: -35px;
        }
    </style>
    <title>Log in</title>
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Background image -->
                    <div class="p-5 bg-image" style="
                            background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
                            height: 300px; background-position:50% 50%; background-repeat:no-reapeat;background-size:cover;
                            "></div>
                    <!-- Background image -->

                    <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary" style="margin-top: -100px;">
                        <div class="card-body py-5 px-md-5">

                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                            <h2 class="fw-bold mb-5 text-center">Log In</h2>
                            
                            <?php if(isset($_GET['errEmail'])){ 
                                echo "Email is required";
                            }else if(isset($_GET['errPasswprd'])){
                                echo "password is required";
                            }

                            if(isset($_GET['erruser_pass'])){
                                $loginErr = "User information is require";
                            }
                            
                            ?>

                            <form action="auth/loginauth.php" method="POST" autocomplete="off">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label">Email address</label>
                                    <input type="email" name="loginemail" id="LoginformEmail" 
                                    class="form-control mb-2 <?php echo $loginErr ? 'is-invalid' : null; ?>" 
                                    required/>
                                    <div class="invalid-feedback">
                                        Please enter a valid Email address. 
                                    </div>

                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label">Password</label>
                                    <input id="password-field" type="password" name="loginpassword" 
                                    class="form-control mb-2 <?php echo $loginErr ? 'is-invalid' : null; ?>" required/>
                                    <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                    <div class="invalid-feedback">
                                        Please enter a valid Password. 
                                    </div>
                                </div>

                                <!-- Checkbox -->
                                <!-- <div class="form-check d-flex justify-content-center mb-4">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                                <label class="form-check-label" for="form2Example33">
                                    Subscribe to our newsletter
                                </label>
                                </div> -->

                                <!-- Submit button -->
                                <button 
                                    type="submit" 
                                    name="submit"
                                    class="btn btn-primary btn-block mb-4"
                                >
                                Log in
                                </button>

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>Or</p>
                                <button class="btn btn-primary">Sign Up Here </button>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include('Layout/footer.php') ?>


<script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            input = $(this).parent().find("input");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
</script>
