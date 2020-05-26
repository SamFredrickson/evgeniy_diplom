<?php require 'php/Init.php'; if(!isset($_SESSION['login'])) header("Location: index.php"); if($db->get_cart_total_price() <= 0) header("Location: index.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Магазин плюшевых мишек</title>
  <!-- MDB icon -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <style>
    html,
    body,
    header,
    .carousel{
      height: 60vh;
    }

    @media (max-width: 740px){
      html,
      body,
      header,
      .carousel{
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px){
      html,
      body,
      header,
      .carousel{
        height: 100vh;
      }
    }

    body{
        overflow-x: hidden;
    }
  </style>
</head>
<body>

  <!-- Modals -->  


     <!-- Create user Modal-->
     <div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Регистрация пользователя</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          <form id="create_user_form">
            <div class="form-group">
              <label for="exampleInputEmail1">Логин</label>
              <input type="text" class="form-control" id="login" aria-describedby="login">
              <div class="invalid-feedback">
                Логин не должен быть пустым!
              </div>
            </div>
            <div class="invalid-feedback" id="login_exists_error" style="padding-bottom: 10px;">Такой логин уже существует!</div>
            <div class="form-group">
              <label for="exampleInputEmail1">Пароль</label>
              <input type="password" class="form-control" id="password" aria-describedby="password">
              <div class="invalid-feedback">
                Пароль не должен быть пустым!
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Имя</label>
              <input type="text" class="form-control" id="firstname" aria-describedby="firstname">
              <div class="invalid-feedback">
                Имя не должен быть пустым!
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Фамилия</label>
              <input type="text" class="form-control" id="lastname" aria-describedby="lastname">
                <div class="invalid-feedback">
                  Фамилия не должен быть пустым!
                </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Отчество</label>
              <input type="text" class="form-control" id="middlename" aria-describedby="middlename">
                <div class="invalid-feedback">
                  Отчество не должен быть пустым!
                </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Номер</label>
              <input type="text" class="form-control" id="phone" aria-describedby="middlename">
                <div class="invalid-feedback">
                  Номер не должен быть пустым!
                </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Почта</label>
              <input type="text" class="form-control" id="email" aria-describedby="middlename">
                <div class="invalid-feedback">
                  Почта не должна быть пустой!
                </div>
            </div>
          </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
            <a class="btn btn-primary" href="#" id="create_user">Создать аккаунт</a>
          </div>
        </div>
      </div>
    </div>
  
  
    
       <!-- Login user Modal-->
       <div class="modal fade" id="loginUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Вход</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="login_user_form">
              <div class="form-group">
                <label for="exampleInputEmail1">Логин</label>
                <input type="text" class="form-control" id="login_in" aria-describedby="login">
                <div class="invalid-feedback">
                  Логин не должен быть пустым!
                </div>
              </div>
              <div class="invalid-feedback" id="login_exists_error" style="padding-bottom: 10px;">Такой логин уже существует!</div>
              <div class="form-group">
                <label for="exampleInputEmail1">Пароль</label>
                <input type="password" class="form-control" id="password_in" aria-describedby="password">
                <div class="invalid-feedback">
                  Пароль не должен быть пустым!
                </div>
              </div>
             
            </form>
            </div>
            <div class="modal-footer">
              <div class="invalid-feedback text-center" id="wrong_pass_login">
                <strong>Неверный логин или пароль!</strong>
              </div>
              <button class="btn btn-danger" type="button" data-dismiss="modal" data-toggle="modal" data-target="#createUser">Еще нет аккаунта?</button>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
              <a class="btn btn-primary" href="#" id="login_user">Войти</a>
              
            </div>
          </div>
        </div>
      </div>
  
  
       <!-- Message user Modal-->
      <div class="modal fade" id="msgUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Отправка сообщения</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="msg_user_form">
              <div class="form-group">
                <label for="exampleInputEmail1">Ваше имя</label>
                <input type="text" class="form-control" id="msg_name" aria-describedby="login">
                <div class="invalid-feedback">
                  Имя не должно быть пустым!
                </div>
              </div>
              <div class="invalid-feedback" id="login_exists_error" style="padding-bottom: 10px;">Такой логин уже существует!</div>
              <div class="form-group">
                <label for="exampleInputEmail1">E-mail</label>
                <input type="text" class="form-control" id="msg_email" aria-describedby="password">
                <div class="invalid-feedback">
                  Почта не должна быть пустой!
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Тема</label>
                <input type="text" class="form-control" id="msg_topic" aria-describedby="password">
                <div class="invalid-feedback">
                  Тема не должна быть пустой!
                </div>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Сообщение</label>
                <textarea class="form-control" id="msg_content" rows="3"></textarea>
                <div class="invalid-feedback">
                  Сообщение не должно быть пустым!
                </div>
              </div>
            </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
              <a class="btn btn-primary" href="#" id="msg_send">Отправить</a>
            </div>
          </div>
        </div>
      </div>
  
  
     <!-- Modals-->  
  
  
    <!-- Start your project here-->  
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container">
                <a href="index.php" class="navbar-brand waves-effect">
                  <img src="img/logo.png" alt="" width="140px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                aria-controls="nvabarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a href="index.php" class="nav-link waves-effect">Главная</a>
                    </li>
                    <li class="nav-item">
                      <a href="#"  data-toggle="modal" data-target="#msgUser" class="nav-link waves-effect">Связь с нами</a>
                    </li>
                    <li class="nav-item">
                      <a href="#footer" class="nav-link waves-effect">Контакты</a>
                    </li>
                  </ul>
                  <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                      <a href="cart.php" class="nav-link waves-effect">
                        <span class="badge red z-depth-1 mr-1" id="amount_items"><?php print $db->get_amount_items(); ?></span>
                        <i class="fa fa-shopping-cart"></i>
                        <span class="clearfix d-none d-sm-inline-block">Корзина</span>
                      </a>
                    </li>             
                    <li class="nav-item">
                      <a href="#" class="nav-link waves-effect">
                        <i class="fa fa-user"></i>
                        <strong class="ml-1" data-toggle="modal" data-target="#loginUser" id="login_navbar">Вход</strong>
                      </a>
                    </li>
                  </ul>
                </div>
            </div>
        </nav>
  

     
        <main class="mt-3 pt-5">
           <div class="container dark-grey mt-5">
           

              <?php $db->show_cart_items(); ?>


           </div>
          
           <hr>
           <div class="container-fluid">
             <div class="row justify-content-center">
               <div class="text-right">
                 <strong><h2>Итого: <span id="total_sum"> <?php print $db->get_cart_total_price(); ?></span>Р</h2></strong>
               </div>
               <button class="btn btn-danger btn-md my-0 p ml-3" id="confirm_order">
                Оформить заказ <i class="fas fa-shopping-cart"></i>
              </button>
             </div>
           </div>
        </main>
      
      <footer class="page-footer text-center font-small mt-5 wow  fadeIn clearfix" id="footer">
        <div class="pt-4">
          <a href="#" class="btn btn-outline-white" role="button">MixaShop</a>
          <a href="#" class="btn btn-outline-white" role="button">Интернет-магазин</a>
        </div>
        <hr class="my-4">
        <div class="pb-4">
          <a href="#footer">
            <i class="fa fa-phone mr-2"></i>
            <strong>+7(964) 913-05-54</strong>
          </a>
          <a href="#footer">
            <i class="fas fa-map-marked-alt mr-2 ml-3"></i>
            <strong>Россия, г. Майкоп, ул. Пушкина 12</strong>
          </a>
        </div>
        <div class="footer-copyright py-3">
          Все права защищены
        </div>
      </footer>
  <!-- End your project here-->

  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>
  <script src="js/redirection.js"></script>

  <script src="js/login.js"></script>
  <script src="js/registration.js"></script>
  <script src="js/cart_item.js"></script>
  <script src="js/cart.js"></script>
  <script src="js/del_item.js"></script>
  <script src="js/mailer.js"></script>


</body>
</html>
