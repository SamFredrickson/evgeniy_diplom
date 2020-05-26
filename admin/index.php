<?php require '../php/Init.php'; if($_SESSION['role'] != 'Админ') header("Location: ../index.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Административная панель</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Навигация</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Админка</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Приборная панель</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Добро пожаловать, <?php print $_SESSION['login']; ?></a></li>
            <li><a href="../index.php">Выход</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Приборная панель</h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Добавление
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Добавить товар</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Приборная панель</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.html" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Приборная панель
              </a>
             
            </div>

           
          </div>
          <div class="col-md-9">
            <!-- Статистика -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Статистика</h3>
              </div>
              <div class="panel-body">
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php print $db->get_amount_users(); ?></h2>
                    <h4>Пользователи</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php print $db->get_amount_comments(); ?></h2>
                    <h4>Комментарии</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?php print $db->get_amount_items_all(); ?></h2>
                    <h4>Товары</h4>
                  </div>
                </div>
              </div>
              </div>

              
              <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Товары</h3>
                </div>
                <div class="panel-body">
                  
                  <table class="table table-striped table-hover">
                        <tr>
                          <th>Название</th>
                          <th>Цена</th>
                          <th>Длина</th>
                          <th></th>
                        </tr>
                       <?php $db->show_admin_items(); ?>
                      </table>
                </div>
                </div>
               
          </div>
        </div>
      </div>
    </section>

    <!-- Modals -->

    <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Окно добавления</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Название товара</label>
          <input type="text" class="form-control" id="title" placeholder="Название товара">
        </div>
        <div class="form-group">
          <label>Цена</label>
          <input type="text" id="price" class="form-control" placeholder="Цена товара">
        </div>
        <div class="form-group">
          <label>Размер</label>
          <input type="text" id="size" class="form-control" placeholder="Размер товара">
        </div>
        <div class="form-group">
              <label for="exampleFormControlTextarea1">Описание</label>
              <textarea class="form-control" id="desc" rows="5"></textarea>
            </div>
        <div class="form-group">
          <label>Картинка</label>
          <input type="file" class="form-control" id="picture">
        </div>
      </div>
     
    </form>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary" id="add_item_btn">Добавить</button>
      </div>
    </div>
  </div>
</div>


<footer class="page-footer text-center font-small mt-4 wow fadeIn clearfix" id="footer">
  <div class="footer-copyright py-3">
    MixaShop
  </div>
  <hr class="my-4">
  <div class="footer-copyright py-3">
    Все права защищены
  </div>
</footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the Комментарии load faster -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/add_item.js"></script>
    <script src="js/delete_item.js"></script>
  </body>
</html>
