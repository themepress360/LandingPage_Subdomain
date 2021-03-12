<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>/';
    var access_token = '<?php echo csrf_token(); ?>'
    </script>
    <script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
    </script>
    <style>
    .input-subdomain {
        border: 1px solid #222;
        width: 235px;

    }

    /*registration form css start */
    .form__register--left {
        background-image: url('admin/images/register-bg.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        height: 100vh;
    }

    .form__heading--color {
        font-weight: 700;
        text-align: center;
        font-size: 48px;
        color: #921a7b;

    }

    .form__text--color {
        text-align: center;
        font-size: 36px !important;
        color: #17a2b8;
    }

    .form__wrapper--padding {
        padding: 0px 87px;
        width: 600px;
    }

    .form__label--color {
        color: #9b9ca3;
        text-transform: uppercase;
        width: 100%
    }

    .form__input--shadow {
        border: 2px solid #e0e0ec !important;
        border-radius: .2rem;
        box-shadow: inset 0 .25rem .125rem 0 rgba(0, 0, 0, .05) !important;
        max-height: 45px;
    }

    .input__servername--height {
        max-height: 45px;
    }

    .form__input--shadow:focus {
        border: 2px solid #921a7b !important;
        outline: none !important;
        border: 1px solid red;
    }

    .form__submit--btn {
        background-color: #17a2b8 !important;
        color: #fff;
        border: none;
        width: 75%;
        margin-left: 15px;
        padding: 9px 25px;
        border-radius: 6px;
        font-weight: 500 !important;
    }
      
      /**registration form responsive css start**/

    @media only screen and (max-width:768px) {
        .form__register--left {
            height: 745px;
        }

        .form__heading--color {
            font-size: 38px;
            margin-top: 0px;
        }

        .form__text--color {
            font-size: 22px !important;
        }

        .form__wrapper--padding {
            padding: 0px 0px;
            width: auto;
        }

        .form__input--shadow {
            width: 100%;
            max-height: 38px;
        }

        .input-subdomain {
            width: 235px !important;

        }

        .input__servername--height {
            max-height: 38px !important;
        }

        .form__submit--btn {
            width: 100%;
            margin-left: 0px;
            padding: 5px 0px;
        }
    }

    @media only screen and (max-width:766px) {
        .content {
             padding: 20px !important;
        }
        .form__register--left {
            height: 850px;
        }

        form#addSubDomainForm {
            margin-top: -800px;
        }

        .input-subdomain {
            width: 150px !important;
        }

        .form__submit--btn {
            margin-bottom: 20px;
        }
    }

    @media screen and (max-width: 1100px) and (min-width: 700px) {
       
        .form__wrapper--padding {
            padding: 0px 0px;
            width: auto;
        }

        .form__text--color {
            font-size: 24px !important;
        }

        .form__heading--color {
            font-size: 36px;
        }

        .form__input--shadow {
            width: 100%;
        }

        .input-subdomain {
            width: 235px !important;
        }

        .form__submit--btn {
            width: 100%;
            margin-left: 0px;
        }
    }

    @media screen and (max-width: 1200px) and (min-width: 1110px) {

        .form__submit--btn {
            width: 82%;
            margin-left: 84px;
        }
    }

    @media only screen and (max-width:326px) {
        .form__text--color {
            font-size: 20px !important;
        }

        .form__heading--color {
            font-size: 28px !important;
        }
    }
    @media screen and (max-width: 1870px) and (min-width: 850px){
        .form__register--left{
            height:auto !important;
        }
    }

      /**registration form responsive css End**/

    /* form css End */
    </style>
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"
        type="text/css">
    <script src="{{asset('admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css"
        href="https://dev-tollpays.amaxzatech.com/public/administration/default/css/toastr.min.css" />
    <script src="https://dev-tollpays.amaxzatech.com/public/administration/default/js/toastr.min.js"></script>
    <script src="{{asset('admin/js/common.js')}}"></script>
</head>

<body>
    <section>
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 form__register--left">



                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <form id="addSubDomainForm">
                        <div class="content">
                            <h1 class="form__heading--color mt-2 ">REGISTER NOW </h1>
                            <p class="form__text--color p-font mt-xl-4 mb-xl-4 mt-md-0 mb-md-2">GET THE ULTIMATE PROFIT
                                FROM HOME TODAY</p>
                            <div class=" form__wrapper--padding">
                                <label for="fname" class="form__label--color">First Name</label>
                                <input class="m-b-20 form__input--shadow" type="text" name="first_name" />

                                <label for="lname" class="form__label--color">last Name</label>
                                <input class="m-b-20 form__input--shadow" type="text" name="last_name" />
                                <div class="input-group">
                                    <label for="subdomain" class="form__label--color">Subdomain</label><br>
                                    <input class="m-b-20 form__input--shadow input-subdomain" type="text"
                                        name="subdomain" />
                                    <div class="input-group-append" style="height:54px;">
                                        <span class="input-group-text input__servername--height" id="basic-addon2">
                                            <?php echo '.'.$_SERVER['SERVER_NAME'];?> </span>
                                    </div>
                                </div>
                                <label for="phone" class="form__label--color">Phone Number</label>
                                <input class="m-b-20 form__input--shadow" type="number" name="phone_number" />
                                <label for="email" class="form__label--color">Email</label>
                                <input class="m-b-20 form__input--shadow" type="email" name="email" />
                                <label for="link" class="form__label--color">Referral Link</label>
                                <input class="m-b-20 form__input--shadow" type="url" name="referral_link" />


                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                            <div class="text-center mt-xl-5 mt-md-3"> <button type="button"
                                    class="form__submit--btn  p-font btn-border ajax svBtn" method="subdomaincreate"
                                    validate="1" callback="addSubDomainCallback" formid="addSubDomainForm"
                                    style="background-color:#2BAD44;color:#fff">Get Started</button></div>

                        </div>
                    </form>
                </div>

            </div>
        </div>


    </section>

    <script type="text/javascript">
    function addSubDomainCallback(response) {
        toastr['success']("Sub Domain add successfully.");
        window.location = base_url + 'success/' + response.data.subdomain_id;
    }
    </script>
</body>

</html>