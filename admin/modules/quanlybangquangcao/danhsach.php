<?php
$sql_danhsach = "SELECT slider.*,sanpham.TenSP FROM slider JOIN sanpham ON slider.MaSP = sanpham.MaSP  ORDER BY Id ASC";
$result = mysqli_query($mysqli, $sql_danhsach);
$row_count = $result->num_rows;
?>
<main class="content">
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-9">
                <h1 class="h3 mb-3">Danh sách sản phẩm quảng cáo</h1>
            </div>
            <div class="col-3 text-end">
                <?php if ($row_count >= 2) {
                    echo '<a title="Vui lòng xóa menu để thêm mới." class="btn btn-warning btn-lg">Để thêm mới, vui lòng xóa Menu.</a>';
                } else {
                    echo '<a href="?action=quanlybangquangcao&query=them" class="btn btn-primary btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle align-middle me-2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="16"></line>
                        <line x1="8" y1="12" x2="16" y2="12"></line>
                    </svg>Thêm SP quảng cáo</a>';
                }
                ?>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card table-responsive">
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Video</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>
                                <td>' . $i++ . '</td>
                                <td>' . $row['TenSP'] . '</td>
                                <td><img width=auto height=80 src="modules/quanlybangquangcao/img/' . $row['HinhAnh'] . '" alt=""> </td>
                                <td><video height="80" controls>
                                <source src="modules/quanlybangquangcao/video/' . $row['Video'] . '" type="video/mp4">
                            </video></td>
                                <td><a class="btn btn-sm btn-primary" href="?action=quanlybangquangcao&query=sua&id=' . $row['Id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>Sửa</a></td>
                                <td><a class="btn btn-sm btn-danger" href="modules/quanlybangquangcao/xuly.php?id=' . $row['Id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 align-middle me-2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>Xóa</a></td>
                            </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>