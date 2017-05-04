<?php include '../inc/header.php'; ?>
<?php 
if($_SESSION['Ulevel'] != 1){
    header("location: ../index.php");
}
$sqlgetusers = "SELECT * FROM `users`";
$getuser     = $conn->query($sqlgetusers);

if(isset($_GET['DU'])){
    $Did = $_GET['DU'];
    $sqlDelete = "DELETE FROM `users` WHERE `u_id` = $Did";
    $conn->query($sqlDelete);
    header("location: index.php");
}

?>
<style>
body{
    background:#eee;    
}
.main-box.no-header {
    padding-top: 20px;
}
.main-box {
    background: #FFFFFF;
    -webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -o-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
    box-shadow: 1px 1px 2px 0 #CCCCCC;
    margin-bottom: 16px;
    -webikt-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
.table a.table-link.danger {
    color: #e74c3c;
}
.label {
    border-radius: 3px;
    font-size: 0.875em;
    font-weight: 600;
}
.user-list tbody td .user-subhead {
    font-size: 0.875em;
    font-style: italic;
}
.user-list tbody td .user-link {
    display: block;
    font-size: 1.25em;
    padding-top: 3px;
    margin-left: 60px;
}
a {
    color: #3498db;
    outline: none!important;
}
.user-list tbody td>img {
    position: relative;
    max-width: 50px;
    float: left;
    margin-right: 15px;
}

.table thead tr th {
    text-transform: uppercase;
    font-size: 0.875em;
}
.table thead tr th {
    border-bottom: 2px solid #e7ebee;
}
.table tbody tr td:first-child {
    font-size: 1.125em;
    font-weight: 300;
}
.table tbody tr td {
    font-size: 0.875em;
    vertical-align: middle;
    border-top: 1px solid #e7ebee;
    padding: 12px 8px;
}</style>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>User</span></th>
                                <th><span>ID</span></th>
                                <th class="text-center"><span>Status</span></th>
                                <th><span>Email</span></th>
                                <th><span>Action</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $getuser->fetch_assoc()) { 
                                    if($row['u_level'] == 0){
                                        $level = "Member";
                                    }elseif ($row['u_level'] == 1) {
                                        $level = "Admin" ;
                                    }
                                    
                                    ?>
                                <tr>
                                    <td>
                                        <img src="http://bootdey.com/img/Content/user_1.jpg" alt="">
                                        <a href="#" class="user-link"><?= $row['u_name'] ?></a>
                                        <span class="user-subhead"><?= $level ?></span>
                                    </td>
                                    <td><?= $row['u_id'] ?></td>
                                    <td class="text-center">
                                        <span class="label label-default">pending</span>
                                    </td>
                                    <td>
                                        <a href="#"><?= $row['u_email'] ?></a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?= $row['u_id'] ?>">Delete user</button>
                                    </td>
                                </tr>
                                 <!-- Modal -->
  <div class="modal fade" id="myModal<?= $row['u_id'] ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete "<?= $row['u_name']  ?>"</h4>
        </div>
        <div class="modal-body">
          <p>Do you really want to delete this member?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <a href="?DU=<?= $row['u_id'] ?>" class="btn btn-primary" >Delete user</a>
        </div>
      </div>
      
    </div>
  </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>