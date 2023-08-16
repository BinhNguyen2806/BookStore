<div class="row g-0 mx-0">
    <div class="col-2">
        <?php include "./view/sidebar.php" ?>
    </div>
    <div class="col-10 p20">
        <h3 class="txt-semiBold">Thêm người dùng mới</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Loại người dùng</th>
                    <th scope="col">Thêm</th>
                </tr>
            </thead>
            <tbody>
                <form method="post">
                    <tr>
                        <td>
                            <input type="text" name="email" placeholder="Email" require>
                        </td>
                        <td>
                            <input type="password" name="password" placeholder="Password" require>
                        </td>
                        <td>
                            <select name="rold" id="rold">
                                <option value="1">Quản trị viên</option>
                                <option value="2" selected="selected">Thành viên</option>
                            </select>
                        </td>
                        </td>
                        <td>
                            <button class="btn btn-primary fs14" name="add">Thêm</button>
                        </td>
                    </tr>
                </form>
                    <tr>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p>Thêm người dùng thành công!</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </tr>
            </tbody>
        </table>

        <h3 class="txt-semiBold mt45">Danh sách thành viên</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    
                    $user = getAllUser("user", connectdb());
                    $count = 0;
                    foreach ($user as $user) {
                        $count++;
                        echo '
                            <tr>
                                <th scope="row">'.$count.'</th>
                                <td scope="col">'.$user['full_name'].'</td>
                                <td scope="col">'.$user['email'].'</td>
                                <td scope="col">'.$user['phone'].'</td>
                                <td scope="col">
                                    <button class="btn btn-success fs14" 
                                    type="button" data-bs-toggle="modal" 
                                    data-bs-target="#modal'.$user['user_id'].'">Sửa</button>    
                                </td>
                                <td scope="col">
                                    <button class="btn btn-danger fs14"
                                    type="button" data-bs-toggle="modal" 
                                    data-bs-target="#del'.$user['user_id'].'">Xoá</button>    
                                </td>
                            </tr>
                            <div class="modal fade" id="modal'.$user['user_id'].'" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs26" id="modal'.$user['email'].'Label">Cập nhật</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form method="POST" action="index.php?act=user">
                                            <div>
                                                <label for="full_name">User ID</label>
                                                <input class="form-control" value="'.$user['user_id'].'" id="user_id" name="user_id" disabled />
                                            </div>
                                            <div>
                                                <label for="full_name">Họ và Tên</label>
                                                <input class="form-control" value="'.$user['full_name'].'" id="full_name" name="full_name"></input>
                                            </div>
                                            <div>
                                                <label for="phones">Số điện thoại</label>
                                                <input class="form-control" value="'.$user['phone'].'" id="phone" name="phone"></input>
                                            </div>
                                            <div class="mt10 text-end">
                                                <button type="button" class="btn btn-secondary fs14" data-bs-dismiss="modal">Huỷ</button>
                                                <button type="submit" class="btn btn-primary fs14" name="btn-submit-user">Cập nhật</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal" id="del'.$user['user_id'].'" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="index.php?act=user">
                                            <input type="hidden" class="form-control" value="'.$user['user_id'].'" id="user_id" name="user_id" />

                                            <p>Bạn có chắc chắn muốn xoá người dùng '.$user['full_name'].' .</p>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                                            <button type="submit" class="btn btn-primary" name="del-user">Đồng ý</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>
                
            </tbody>
        </table>
    </div>
</div>